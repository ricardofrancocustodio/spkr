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
                           <!-- <li class="breadcrumb-item"><a href="{{ asset('evaluationtest') }}">< Tests</a></li>
                        <li class="breadcrumb-item active">General Form</li>-->
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
                            <h3 class="card-title">{{ $listEvaluationTest->candidate_name }} - Evaluation Test</h3>
                            <!-- <h5 class="card-title float-right">From:</h5> -->
                        </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Candidate / Student Name</label>
                                    <p>{{ $listEvaluationTest->candidate_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <p>{{ $listEvaluationTest->candidate_email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="url_link">LinkedIn Profile (URL)</label>
                                    <p>{{ $listEvaluationTest->url_link }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="examplePhoneNumber">Phone Number</label>
                                    <p>{{ $listEvaluationTest->country_name }} (+{{ $listEvaluationTest->country_code }}) {{ $listEvaluationTest->phone_number }}</p>
                                </div>
                                <div class="list-group">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Questions of the Level Test:  </label>
                                        <div class="input-group" style="">
                                            @foreach($testanswers as $key => $questions)
                                                - {{ $questions->question_text }} <br>

                                            @endforeach
                                        </div>
                                    </div>
                                </div> 
                                <br>
                                <div class="form-group">
                                    <label for="notes">Notes: </label><br>
                                    {{ $listEvaluationTest->notes }}
                                </div>    
                            </div>
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-outline-primary" id="createtest" onclick="createatest();">Create Test</button> -->
                                <input type="hidden" name="id_et_creation_user" value="{{ auth()->user()->id }}">
                                <a type="submit" role="button" class="btn btn-outline-danger" id="edittest" href="{{ route('evaluationedit' , $listEvaluationTest->id_evaluation) }}" >Edit Test</a>
                                <a type="submit" role="button" class="btn btn-outline-primary float-right" id="back" href="{{ route('evaluationtest') }}"  >Back</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</div>
@endsection