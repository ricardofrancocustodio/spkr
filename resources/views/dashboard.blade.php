<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>                    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('General instructions') }} - <b style="color: red;">Attention!!! </b></div>
                <br>
                   <!--  <h1>Instructions for  Tests </h1>   <br> -->


                    <div class="">
                        
                            <div class="col-12">
                                <!-- Custom Tabs -->
                                <div class="card">
                                  <!--<div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Tabs</h3>
                                  </div> /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                    <i class="fas fa-microphone"></i>&nbsp;Allow access to the microphone<br><br>
                                    <i class="far fa-clock"></i>&nbsp;There will be an active timer for each question for reminding you how much is left <br><br>
                                    <i class="fas fa-tablet-alt"></i>&nbsp; The next question is automatically displayed on screen after finish the recording <br><br>
                                    <i class="far fa-pause-circle"></i>&nbsp;You cannot pause the Mock Test. <br><br>
                                    <i class="far fa-stop-circle"></i>&nbsp;Stop the Mock Test anytime you want<br><br><br>
                                    <i class="far fa-stop-circle"></i>&nbsp;Test your microphone &nbsp;&nbsp;
                                        <button class="btn btn-success" id="record">
                                            <i class="fas fa-record-vinyl"></i> Record 
                                        </button>&nbsp;&nbsp;
                                        <button class="btn btn-secondary" id="listen">
                                            <i class="bi bi-megaphone"></i>Listen 
                                        </button> 
                                        
                                    <br>
                                    
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                                </div>
                                <!-- ./card -->
                            </div>
                            
                            <form action="{{ url('testindex') }}" method="POST" style="width: 100%;">
                                 @csrf
                                <input type="hidden" name="id_practice_test" value="1">
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}"><br>
                                <button class="btn btn-danger" style="width: 100%; font-weight: bold;">Let's Go!</button>
                        </form>
                        </div>
                        
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>