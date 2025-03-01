<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Success') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="container text-center">
                            <div class="row">
                                <div class="alert alert-success" role="alert">
                                    <h1 class="display-3">Well done!</h1>
                                    <p>You finished your test. We are processing....</p>
                                    <br>
                                    <hr>
                                    <p class="mb-0">You will be redirected to your Recordings list in few seconds. </p>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <script>
                        
                            setTimeout(function(){
                                window.location.href = '/dashboard';
                            }, 5000);
                    </script>
                </div>
            </div>
        </div>            
    </div>    
</x-app-layout>