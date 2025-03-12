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
                        <p id="question-text" style="color:black; font-size:20px; font-weight:bold;">{{ $question1['question_text'] }}</p>
                        <br><br>
                        <!-- Imagem da Pergunta -->
                            <!-- <button id="record-button" class="quiz-record-btn">🎤 Recording</button>  -->              
                            <div class="blobs-container" style="">
                                @if($question1['img_question'])
                                    <div id="image-container" class="{{ $question1['img_question'] ? '' : 'hidden' }}" style="">
                                        <img id="question-image" src="{{ asset($question1['img_question']) }}" alt="Question Image" class="quiz-image" style="width: 30%; height: 30%;">
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
                                <input type="hidden" name="id_practice_test" value="{{ $question1['id_practice_test'] }}">
                                <input type="hidden" name="id_user" value="{{ $userID }}">
                                <input type="hidden" name="id_question" value="{{ $question1['id_question'] }}">
                                <input type="hidden" name="id_exam_type" value="{{ $question1['id_exam_type'] }}">
                                <input type="hidden" name="id_tenant" value="{{ $question1['id_tenant'] }}">
                                <input type="hidden" name="id_company" value="{{ $question1['id_company'] }}">
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

</script>
</x-app-layout>
