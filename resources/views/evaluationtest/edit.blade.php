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
                            <h3 class="card-title">New Evaluation Test</h3>
                        </div>
                        <form method="POST" action="{{ route('evaluationstore') }}" id="evaluationstore" name="evaluationstore">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Candidate / Student Name</label>
                                    <input type="text" class="form-control" id="candidate_name" name="candidate_name"  placeholder="Enter name" value="{{ $listEvaluationTest->candidate_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="candidate_email" name="candidate_email" placeholder="Enter email" value="{{ $listEvaluationTest->candidate_email }}">
                                </div>
                                <div class="form-group">
                                    <label for="url_link">LinkedIn Profile (URL)</label>
                                    <input type="text" class="form-control" id="url_link" name="url_link" placeholder="Enter LinkedIn Profile Link" value="{{ $listEvaluationTest->url_link }}">
                                </div>
                                <div class="form-group">
                                    <label for="examplePhoneNumber">Phone Number</label>
                                        <small>
                                            <a href="#">
                                                change?
                                            </a>
                                        </small>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <!-- <input type="tel" class="form-control" value="+{{ $listEvaluationTest->country_code }}"> &nbsp; -->
                                            <select name="countrycode_select" id="countrycode_select">
                                                <option value="{{ $listEvaluationTest->country_code }}" id="countrycode" name="countrycode">
                                                {{ $listEvaluationTest->country_name }} (+{{ $listEvaluationTest['country_code'] }})
                                                </option>
                                            @foreach($countrycode as $key => $code)
                                                <option value="{{ $code['id_countrycode'] }}" id="countrycode" name="countrycode">
                                                    {{ $code['country_name'] }} (+{{ $code['data_countrycode'] }})
                                                </option>
                                            @endforeach
                                            </select>
                                        </div> 
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" aria-label="Text input with dropdown button" value="{{ $listEvaluationTest->phone_number }}">
                                    </div> 
                                </div>

                                <!-- <div class="form-group">
                                    <label for="examplePhoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" data-js="" placeholder="Enter Phone Number">
                                </div> -->
                                
                               <br>
                                <div class="list-group">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Questions of the Level Test:  </label>
                                            <small>
                                                <a href="#">
                                                    change?
                                                </a>
                                            </small>
                                        <div class="input-group" style="width:100%; overflow-y: hidden; margin: 0; padding: 0; overflow-x: hidden; height: 10em; overflow: scroll; width: 100%; ">
                                            <div class="">
                                                <ul class="list-group"  id="questionsperlevel" style="">
                                                @foreach($testanswers as $key => $questions)
                                                    <li>
                                                        <input type="checkbox" checked/> {{ $questions->question_text }}
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="3" value="">{{ $listEvaluationTest->notes }}</textarea>
                                </div>    
                            </div>
                            
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-outline-primary" id="createtest" onclick="createatest();">Create Test</button> -->
                                <input type="hidden" name="id_et_creation_user" value="{{ auth()->user()->id }}">
                                
                                <button type="submit" class="btn btn-outline-success" id="updatetest"  >Update Test</button>
                                <a type="submit" role="button" class="btn btn-outline-primary float-right" id="back" href="{{ route('evaluationtest') }}"  >Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection