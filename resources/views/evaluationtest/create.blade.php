@extends('layouts.apptests')
@section('content')
<div class="">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>General Form</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('evaluationtest') }}">< Tests</a></li>
                        <!--<li class="breadcrumb-item active">General Form</li>-->
                    </ol> 
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">New Evaluation Test</h3>
                            <h5 class="card-title float-right">From: {{ auth()->user()->name }}</h5>
                        </div>
                        <form method="POST" action="{{ route('evaluationstore') }}" id="createtest" name="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">To: Candidate / Student Name</label>
                                    <input type="text" class="form-control" id="candidate_name" name="candidate_name"  placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="candidate_email" name="candidate_email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="url_link">LinkedIn Profile (URL)</label>
                                    <input type="text" class="form-control" id="url_link" name="url_link" placeholder="Enter LinkedIn Profile Link">
                                </div>
                                <div class="form-group">
                                    <label for="examplePhoneNumber">Phone Number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select name="country_code" id="country_code">
                                                @foreach($countrycode as $key => $code)
                                                <option value="{{ $code->data_countrycode }}" id="country_code_opt" name="country_code_opt">
                                                    {{ $code->country_name }} (+{{ $code->data_countrycode }})
                                                
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" aria-label="Text input with dropdown button">
                                    </div> 
                                </div>

                                <!-- <div class="form-group">
                                    <label for="examplePhoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" data-js="" placeholder="Enter Phone Number">
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputFile">English Level Template: </label><i class="fa fa-question-circle fa-1" data-toggle="tooltip" data-placement="top" title="These templates are pre-selected questions from our database"  aria-hidden="true"></i>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <!-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                                            <select class="form-select form-select-md"
                                                aria-label=".form-select-md example" id="selectenglishlevel">
                                                <option selected> - </option>
                                                @foreach($testtypes as $key => $level)
                                                <option value="{{ $level['id_test_type'] }}" id="englishlevel" name="">
                                                    {{ $level['test_level'] }} - {{ $level['test_type_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <br>
                                <div class="list-group">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Select the questions of the Level Test:  </label><i class="fa fa-question-circle fa-1" data-toggle="tooltip" data-placement="top" title="how to select? " aria-hidden="true"></i>
                                        <div class="input-group" style="width:100%; overflow-y: hidden; margin: 0; padding: 0; overflow-x: hidden; height: 10em; overflow: scroll; width: 100%; ">
                                            <div class="">
                                                <ul class="list-group"  id="questionsperlevel" style=" ">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                </div>    
                            </div>
                            
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-outline-primary" id="createtest" onclick="createatest();">Create Test</button> -->
                                <input type="hidden" name="id_et_creation_user" value="{{ auth()->user()->id }}">
                                
                                <button type="submit" class="btn btn-outline-primary" id="createtest" onclick="createatest();" >Create Test</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
   
    <script>
        
        document.addEventListener('DOMContentLoaded', function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                $('#selectenglishlevel').on('change', function(e) {
                    var id_test_type = e.target.value;
                            $.ajax({
                                url: "{{ route('getquestionlist') }}",
                                type: "POST",
                                data: {
                                    id_test_type: id_test_type
                                },
                                success: function(data) {
                                    $.each(data, function(i, val){
                                        $.each(data[i], function(j, v){

                                            var li = document.createElement('li');
                                                li.setAttribute("style","margin: 0; padding: 0");

                                            var input = document.createElement('input');
                                                input.setAttribute("type", 'checkbox');
                                                input.setAttribute("value", v.id_question);
                                                input.setAttribute("id", 'questionoption');
                                                input.setAttribute("class", 'list-group-item');
                                                
                                                li.textContent = v.question_text;
                                                li.prepend(input);

                                            var questionsperlevel = document.getElementById('questionsperlevel');
                                                questionsperlevel.appendChild(li);

                                        })
                                    });
                
                                }

                            });       
                });

            });

        });

    
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })

            // na hora que clica em submit
            // pega as questões selecionadas, valida (createtest), se ok -> coloca em um input hidden value
            // essas questões vão para o banco relacionadas ao evaluation test
            //cria o teste
            //associa as questões a esse teste
            //ok

            function createatest(){

                var createtest              =  document.getElementById('createtest');
                var selectedQuestions       =  document.querySelectorAll('input[id="questionoption"]:checked');
                var selectedQuestions_arr   =  Array.from(selectedQuestions);
                var id_question = [];
                
                for (var i=0; i<selectedQuestions_arr.length; i++){
                    
                    id_question.push(selectedQuestions_arr[i].value);
                    //console.log(id_question);
                }

                id_question.forEach(function(el, n) {
                        //console.log(el++ n);
                        let inputIdQ = document.createElement("input");
                            inputIdQ.setAttribute("type", "hidden");
                            inputIdQ.setAttribute("name", "id_question[]");
                            inputIdQ.setAttribute("id", "id_question");
                            inputIdQ.setAttribute("value", el);

                        var form_createtest = document.getElementById('createtest'); 
                        form_createtest.appendChild(inputIdQ);
                        //console.log(inputIdQ);
                     
                    }); 
                    
//                var v = document.getElementById('id_question').id_question[i];
                    
                

                      /*   var questInput = document.getElementById('id_question');
                        quest.setAttribute('value', selectedQuestions_arr[i].value);
                        
                        console.log(quest);
                        //console.log(quest.value);
                        console.log(selectedQuestions_arr[i].value); */
                    
                

            }


       /*  function createatest(){
        
            var createtest              =  document.getElementById('createtest');
            var selectedQuestions       =  document.querySelectorAll('input[id="questionoption"]:checked');
            var selectedQuestions_arr   =  Array.from(selectedQuestions);
            
            if(selectedQuestions_arr.length == 0){
                alert("No question selected");
                
            }else if (selectedQuestions_arr.length > 10){
                alert("The test can be created with only 10 questions");

            }else if (selectedQuestions_arr.length == 10){
                    if (confirm("The test will be created. Continue?") == false){
                        window.close();
                    }else{
                        window.close();
                        alert("ok")
                    }
            }else{
                alert("The test will be created with less than 10 questions. is that okay?")
            }
    }
     */

    </script>
    

</div>
@endsection