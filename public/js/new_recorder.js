function speakText(text, callback) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.onend = function() {
        console.log("Texto falado completamente.");
        callback();
    };
    window.speechSynthesis.speak(utterance);
}

document.addEventListener("DOMContentLoaded", function() {
    const synth = window.speechSynthesis;
    let btn = document.getElementById("pulseeffect");
    btn.setAttribute("class", "listen");
    btn.setAttribute("id", "listen");

    document.getElementById('stop-test').onclick = function(e) { 
        if (window.confirm("Do you wish to stop the Test? Your answer won't be recorded.") == false) {
            window.close();
        } else {
            synth.cancel();
            document.getElementById('timer').innerHTML = 'Test stopped';
            window.location.href = "{{ route('dashboard') }}";
        }
    };

    function loadAudioQuestion() {
        console.log("Carregando questão...");
        document.getElementById('timer').innerHTML = '<span style="color:gray;">Listen!</span>';

        const questionText = "{{ $question['question_text'] }}";
        const audioQuestion = "{{ $question['audio_question'] }}" + "!  !record your answer after the beep sound";

        speakText(questionText, function() { 
            console.log("Texto principal falado, iniciando questão...");
            const question = new SpeechSynthesisUtterance(audioQuestion);
            
            question.onend = function() {
                console.log("Áudio da questão finalizado.");
                playBeepAndStartRecording();
            };

            synth.speak(question);
        });
    }

    function playBeepAndStartRecording() {
        var beep = new Audio("/audio/beep.mp3");
        beep.play();

        beep.addEventListener('ended', function() {
            var timeleft = 5;
            var timeleft_in_ms = timeleft * 1000;

            // Ativar temporizador de contagem regressiva
            var downloadTimer = setInterval(function() {
                if (timeleft <= 0) {
                    clearInterval(downloadTimer);
                } else {
                    document.getElementById("timeleft").innerHTML = timeleft;
                }
                timeleft -= 1;
            }, 1000);

            // Iniciar gravação de áudio
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(stream => { 
                    let rec = new MediaRecorder(stream);
                    let audioChunks = [];
                    rec.start();

                    document.getElementById("listen").setAttribute("class", "blob red");
                    document.getElementById('timer').innerHTML = rec.state;

                    setTimeout(() => rec.stop(), timeleft_in_ms);

                    rec.ondataavailable = e => {
                        audioChunks.push(e.data);
                    };

                    rec.onstop = () => {
                        console.log("Gravação finalizada.");
                        document.getElementById('timer').innerHTML = 'stopped';

                        let blob = new Blob(audioChunks, { type: 'audio/ogg; codecs=opus' });
                        let formData = new FormData();
                        formData.append("recordedAudio", blob, "audio.ogg");  
                        formData.append("id_question", document.querySelector("input[name=id_question]").value);
                        formData.append("id_exam_type", document.querySelector("input[name=id_exam_type]").value);
                        formData.append("id_practice_test", document.querySelector("input[name=id_practice_test]").value);
                        formData.append("_token", document.querySelector("input[name=_token]").value);

                        fetch("{{ route('savequestions') }}", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log("Upload concluído:", data);
                                window.location.href = data.next_question_url;
                            } else {
                                console.error("Erro ao salvar a resposta:", data);
                            }
                        })
                        .catch(error => {
                            console.error("Erro no envio do áudio:", error);
                        });
                    };
                })
                .catch(error => {
                    console.error("Erro ao acessar o microfone:", error);
                });
        });
    }

    // Iniciar leitura da questão automaticamente quando a página carregar
    loadAudioQuestion();
});
