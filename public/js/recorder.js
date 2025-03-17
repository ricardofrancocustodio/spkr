function speakText(text, callback) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.onend = callback;
    window.speechSynthesis.speak(utterance);
}

var btn = document.getElementById("pulseeffect");
btn.setAttribute("class", "listen");
btn.setAttribute("id", "listen");
const synth = window.speechSynthesis;

document.getElementById('stop-test').onclick = function(e) { 
    if (window.confirm("Do you wish to stop the Test? Your answer won't be recorded.") == false) {
        window.close();
    } else {
        synth.cancel();
        document.getElementById('timer').innerHTML = 'Test stopped';
        window.location.href = "{{ route('dashboard') }}";
    }
};

    synth.addEventListener("load", loadAudioQuestion());

function loadAudioQuestion() {
    document.getElementById('timer').innerHTML = '<span style="color:gray;">Listen!</span>';
    const audioQuestion = "{{ $question1['audio_question'] }}" + "!  !record your answer after the beep sound";

    speakText("{{ $question1['question_text'] }}", function() { 
        const question = new SpeechSynthesisUtterance(audioQuestion);
        synth.speak(question);

        var interval = setInterval(function() {
            var t = synth.speaking;
            if (t == false) {
                clearInterval(interval); 
                var beep = new Audio("/audio/beep.mp3");
                beep.play();

                beep.addEventListener('ended', function(ev) {
                    var timeleft = 5;
                    var timeleft_in_ms = timeleft * 1000;

                    // Countdown timer activation
                    var downloadTimer = setInterval(function() {
                        if (timeleft <= 0) {
                            clearInterval(downloadTimer);
                        } else {
                            document.getElementById("timeleft").innerHTML = timeleft;
                        }
                        timeleft -= 1;
                    }, 1000);

                    // Start MediaRecorder
                    $(function() {
                        let rec;
                        navigator.mediaDevices.getUserMedia({ audio: true })
                            .then(stream => { 
                                rec = new MediaRecorder(stream);
                                let audioChunks = [];
                                rec.start();
                                
                                var btn1 = document.getElementById("listen");
                                btn1.setAttribute("class", "blob red");
                                document.getElementById('timer').innerHTML = rec.state;

                                // Stop recording after timeleft_in_ms
                                setTimeout(function() { 
                                    rec.stop(); 
                                }, timeleft_in_ms);

                                rec.ondataavailable = e => {
                                    audioChunks.push(e.data);
                                };

                                rec.onstop = () => {
                                    document.getElementById('timer').innerHTML = 'stopped';
                                    let blob = new Blob(audioChunks, { type: 'audio/ogg; codecs=opus' });
                                    let reader = new FileReader();
                                    reader.readAsDataURL(blob);

                                    reader.onloadend = function() {
                                        let input = document.createElement("input");
                                        input.setAttribute("type", "hidden");
                                        input.setAttribute("name", "recordedAudio");
                                        input.setAttribute("id", "recordedAudio");
                                        input.setAttribute("value", reader.result);

                                        var form = document.getElementById('savequestions');
                                        form.appendChild(input);
                                        form.submit();
                                    };
                                };
                            })
                            .catch(error => {
                                console.error("Error accessing media devices:", error);
                            });
                    });
                });
            }
        }, 2000);
    });
}

if (!synth.__loadAudioQuestionAdded) {
        synth.addEventListener("load", loadAudioQuestion);
        synth.__loadAudioQuestionAdded = true; // Marca como adicionado
    }

