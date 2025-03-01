<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recordings') }}
        </h2>
    </x-slot>
    <!-- aqui vai ter um foreach para buscar as questões e separar por módulos (faz sentido?) -->
    <div class="content">
        <div class="row">
            <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100" style="text-align:center;">
                                <b>
                                    Recordings
                                </b>
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="row">
                            <div class="col-6" style="text-align:left;" id="divselectall">
                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="selectall" onclick=""/> Select all:
                            </div>
                            <div class="col-3" style="text-align:center;" >
                                <form method="POST" action="{{ url('deleteselectedanswer') }}" id="checkedanswers"> 
                                        @csrf  
                                </form> 
                            </div>
                            <div class="col-3" style="text-align:center;" >
                                <button type="button" class="btn btn-outline-danger invisible" id="deleteall">Delete All</button>
                            </div>
                        </div>
                        <br>
                        @foreach($recordinglistAccountance as $key => $recording)
                        <div class="row">
                            <div class="col-6">
                                &nbsp;<input type="checkbox" id="id_answer" name="id_answer[]" value="{{ $recording['id_answer'] }}"  />
                                    {{ $recording['question_text'] }}
                            </div>
                            <div class="col-6">
                                <audio  controls src="{{ $recordinglistAccountance[$key]['recorded_audio'] }}" id="audioquestion" >
                            </div>
                                <!--<div class="col">
                                    <form method="POST" action="{{ url('deleteanswer') }}" id="deleteanswer">
                                        @csrf   
                                        <input type="hidden" id="" value="{{ $recording['id_answer'] }}" name="id_answer"/> 
                                        <input type="hidden" name="id_user" value="{{ $recording['id_user'] }}">
                                        <button type="button" class="btn btn-outline-danger" id="submitdeleteanswer" onclick="deleteAnswer()" >delete</button>
                                    </form> 
                                </div>-->
                                
                        </div>
                        <br>
                    
                    @endforeach
                </div>
                <br>
                <!-- <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100" style="text-align:center;">
                                <b>
                                    
                                </b>
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                
                            </div>
                            <div class="col" style="text-align:center;">
                            
                            </div>
                        </div>
                        
                        @foreach($recordinglistAviation as $k => $recording)
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                {{ $recording['question_text'] }}
                            </div>
                            <div class="col" style="text-align:center;">
                                <audio controls src="{{ $recordinglistAviation[$k]['recorded_audio'] }}" id="audioquestion" >
                            </div>
                        </div>
                        <br>
                    
                        @endforeach
                    </div>
                    <br>
                </div> -->
            </div>
        </div>
    </div>

<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>
<script>

    var deleteAllBtn = document.getElementById("deleteall");
    var checkbox  = document.querySelector('input[id="id_answer"]');
    var checkboxes2  = document.querySelectorAll('input[id="id_answer"]');
    var bts = document.querySelectorAll('button[id="submitdeleteanswer"]');
   
    var a = [];
    var ch = [];
    var i;
    var j;
    var hiddenInput;

     document.getElementById('selectall').onclick = function(e) { 
        for (var checkbox1 of checkboxes2) {
            checkbox1.checked = this.checked;
                if (checkbox1.checked){
                    deleteAllBtn.setAttribute('class', 'btn btn-outline-danger visible');
                }else{
                    deleteAllBtn.setAttribute('class', 'btn btn-outline-danger invisible');
                }  
        }
     }

    //deleteAllBtn.addEventListener('onclick', function(){
        deleteAllBtn.onclick = function(e) { 

            var checkboxes_list = document.querySelectorAll('input[id="id_answer"]:checked');
            var checkboxes_list_arr = Array.from(checkboxes_list);
            var count_checkboxes_list_arr = checkboxes_list_arr.length
          
                    if(count_checkboxes_list_arr > 0){
                        window.confirm("Are you sure to delete these selected answer? You won't be able to undo this action.");

                        for (var checkbox of checkboxes_list) {
                            var j = checkbox.value; 
                            a.push(j); 

                                for(i=0; i<a.length; i++){
                                    hiddenInput = document.createElement('input');
                                    hiddenInput.type = 'hidden'
                                    hiddenInput.name = 'id_answer[]'
                                    hiddenInput.value = a[i];
                                } 

                                var form = document.getElementById("checkedanswers");
                                form.appendChild(hiddenInput)
                                form.submit();

                        } 
 
                    }else{
                        alert('No Answer is selected.');
                    } 
        }

        Array.from(checkboxes2).forEach((e, value) => {
            e.addEventListener('click', function(){
                e.checked = this.checked;
                var chbx_list = document.querySelectorAll('input[id="id_answer"]:checked');
                var checkboxes_list_arr = Array.from(chbx_list);
                var countCheckboxesListArr = checkboxes_list_arr.length

                    if(countCheckboxesListArr > 0){
                        deleteAllBtn.setAttribute('class', 'btn btn-outline-danger visible');
                    }else{
                        deleteAllBtn.setAttribute('class', 'btn btn-outline-danger invisible');
                        document.getElementById('selectall').checked= false;
                    }
            });

        });
            
               
 
        
</script>
</x-app-layout>