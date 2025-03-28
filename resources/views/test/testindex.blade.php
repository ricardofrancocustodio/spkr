<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tests') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div id="container">
                    <!-- Caixa da Pergunta -->
                    <div class="quiz-question-box">
                        <p id="question-text" style="color:black; font-size:20px; font-weight:bold;">{{ $question['question_text'] }}</p>
                        <br><br>
                        <!-- Imagem da Pergunta -->
                            <!-- <button id="record-button" class="quiz-record-btn">🎤 Recording</button>  -->              
                            <div class="blobs-container" style="">
                                @if($question['img_question'])
                                    <div id="image-container" class="{{ $question['img_question'] ? '' : 'hidden' }}" style="">
                                        <img id="question-image" src="{{ asset($question['img_question']) }}" alt="Question Image" class="quiz-image" style="width: 30%; height: 30%;">
                                    </div>
                                @endif
                                <div class="">
                                    <div class="blob red" id="pulseeffect">
                                        <span style="color:white; font-size:50px;" id="timeleft"></span>
                                    </div>
                                    <span style="color:red;" id="timer"><b></b></span>
                                </div>
                            </div>     
                        
                        <!-- Áudio da Pergunta -->
                        <div id="audio-container" class="hidden">
                            <audio controls id="question-audio">
                                <source src="" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
                        <br>
                        <br>
                    <!-- Botões de Navegação -->
                        <div class="quiz-buttons">
                            <form method="POST" action="{{ route('savequestions') }}" id="savequestions">
                                @csrf
                                <input type="hidden" name="id_practice_test" value="{{ $question['id_practice_test'] }}">
                                <input type="hidden" name="id_user" value="{{ $userID }}">
                                <input type="hidden" name="id_question" value="{{ $question['id_question'] }}">
                                <input type="hidden" name="id_exam_type" value="{{ $question['id_exam_type'] }}">
                                <input type="hidden" name="id_tenant" value="{{ $question['id_tenant'] }}">
                                <input type="hidden" name="id_company" value="{{ $question['id_company'] }}">
                                <button type="submit" class="quiz-btn quiz-btn-primary">Next Question</button>
                            </form>

                            <form method="POST" action="deleteallanswers">
                                @csrf
                                <button type="submit" class="quiz-btn quiz-btn-secondary">Retake Question</button>
                            </form>

                            <button id="stop-test" class="quiz-btn quiz-btn-danger">Stop Test</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
                console.log("Timeleft: ", timeleft);
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
                        let form = document.getElementById('savequestions');
                        let formData = new FormData(form);
                        formData.append("recordedAudio", blob, "audio.ogg");  
                        formData.append("id_question", document.querySelector("input[name=id_question]").value);
                        formData.append("id_exam_type", document.querySelector("input[name=id_exam_type]").value);
                        formData.append("id_practice_test", document.querySelector("input[name=id_practice_test]").value);
                        formData.append("_token", document.querySelector("input[name=_token]").value);

                        console.log(formData);

                        fetch("{{ route('savequestions') }}", {
                            method: "POST",
                            headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
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

    </script>
  
    
</x-app-layout>
