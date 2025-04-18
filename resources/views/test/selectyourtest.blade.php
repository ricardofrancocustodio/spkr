@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <!-- <img src="/assets/images/banner/bepoficient_usaflag.gif" /> -->
            <b>American Accent</b> English
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <blockquote class="quote-info">
            <p>Accepted and preferred by universities worldwide, the TOEFL® test is a high-quality, high-standard test that assures admissions officers of your readiness for the classroom and beyond. TOEFL is one of the two major English-language tests in the world.</p>
            <!--  <small>Someone famous in <cite title="Source Title">Source Title</cite></small> -->
          </blockquote>
          <form action="{{ url('index') }}" method="POST" style="width: 100%;">
              @csrf
              
              <input type="hidden" name="id_practice_test" value="1">
              <input type="hidden" name="id_user" value="{{ auth()->user()->id }}"><br>
              <button type="submit" class="btn btn-outline-success" style="width:100%;">Start Test</button>
              <!-- <a class="btn btn-success btn-md" href="#" role="button" id="submitForm" style="width:100%;">Start Test</a> -->
          </form>
        </div>
    
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
              <!-- <img src="/assets/images/banner/beproficient_ukflag.gif" /> -->
              <b>Britain Accent</b> English
            
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body clearfix">
          <blockquote class="quote-info">
            <p>More than 10,000 organisations globally trust IELTS®, so when you take the test you can be confident that it is recognised by educational institutions, employers, governments and professional bodies around the world.</p>
            <!-- <small>Someone famous in <cite title="Source Title">Source Title</cite></small> -->
          </blockquote>
          <form action="{{ url('index') }}" method="POST" style="width: 100%;">
              @csrf
              <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
              <input type="hidden" name="id_practice_test" value="2"><br>
              <button type="submit" class="btn btn-outline-success" style="width:100%;">Start Test</button>
              <!-- <a class="btn btn-success btn-md" href="#" role="button" id="submitForm" style="width:100%;">Start Test</a> -->
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection