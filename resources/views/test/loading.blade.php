@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col">
                <!-- <img src="{{ asset('images/test/loading.gif') }}"> -->
                <br>
                <!-- <h1 class="display-3">Processing...</h1> -->
                <form action="{{ url('index') }}" method="POST" style="width: 100%;" id="loading">
                    @csrf
                    <input type="hidden" name="id_practice_test" value="{{ $id_practice_test  }}">
                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}"><br>
                    <button type="submit" class="btn btn-outline-success" style="width:100%;">Next Question</button>
                </form>
            </div>
            <div class="col">
                
            </div>
        </div>
    </div>
</div>
<script>
    // document.getElementById('loading').submit();
</script>
@endsection