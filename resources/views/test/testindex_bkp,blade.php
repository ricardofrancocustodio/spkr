<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tests') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12" style="text-align:right;">
                                
                            <div>
                        </div>
                        <br>
                        <div class="row">    
                            <div class="col-12" style="text-align:left;">
                                <ol><p class="" id="qtext" style="font-weight: bold; font-size: 20px;">{{ $question1['question_text'] }}</b></p></ol>
                            </div>
                        </div>
                            <br>
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <form id="inputForm">
                                            <audio  autoplay id="audioquestion" >
                                        </form>
                                    </div>
                                    <div class="col">
                                        <div class="blobs-container" >
                                            <div class="blob red" id="pulseeffect"><span style="color:white; font-size:50px;" id="timeleft" ></span></div>
                                            <span style="color:red;" id="timer"><b></b></span>
                                        </div>
                                        <!-- <img src="{{ asset('images/test/record-icon-18.png') }}" width="50%" height="100px"> -->
                                    </div>
                                    <div class="col">
                                        
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST"  action="deleteallanswers" style="width: 100%;" id="deleteallanswers">
                                            @method('POST')
                                            @csrf
                                            <input type="hidden" name="id_practice_test" value="{{ $question1['id_practice_test'] }}">
                                            <button type="submit" class="btn btn-outline-success" style="width:50%;" id="retaketest" name="retaketest"  value="Retake Test">Retake Test</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form method="POST"  action="{{ url('savequestions') }}" style="width: 100%;" id="savequestions">
                                        @csrf
                                            <!-- <input id="recordedAudio" name="recordedAudio" type="hidden" />  -->
                                            <input type="hidden" name="id_practice_test" value="{{ $question1['id_practice_test'] }}">
                                            <input type="hidden" name="id_user" value="{{ $userID }}">
                                            <input type="hidden" name="id_question" value="{{ $question1['id_question'] }}">
                                            <input type="hidden" name="id_exam_type" value="{{ $question1['id_exam_type'] }}">
                                                <button type="submit" class="btn btn-outline-warning" style="width:50%;" id="submitForm" value="Next Question">Next Question</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                    <button type="submit" class="btn btn-outline-danger" style="width:50%;" id="stoptest" value="Stop Test" style="color:black;">Stop Test</button>
                                    </div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                           <!--  <script>
                                function speakText(text, callback) {
                                    const utterance = new SpeechSynthesisUtterance(text);
                                    utterance.onend = callback;
                                    window.speechSynthesis.speak(utterance);
                                }

                                var btn = document.getElementById("pulseeffect");
                                btn.setAttribute("class", "listen");
                                btn.setAttribute("id", "listen");
                                const synth = window.speechSynthesis;

                                document.getElementById('stoptest').onclick = function(e) { 
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

                            </script> -->

                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

