<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluation Tests') }}
        </h2>
    </x-slot>
    <!-- FAZER UM FOREACH PARA BUSCAR OS TESTES NO BANCO E LISTAR NA TELA (ROWS E COLUNAS) -->
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="">

                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <!-- <h1>Projects</h1> -->
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active">Projects</li> -->
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="content">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <a class="btn btn-app bg-success" href="{{ route('createevaluationtest') }}">
                                                <i class="fa fa-plus" aria-hidden="true"></i> New Evaluation Test
                                            </a>
                                        </h3>
                                        <div class="card-tools">
                                            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button> --><br>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button">
                                                        <i class='fas fa-search'></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">
                                                        #
                                                    </th>
                                                    <th style="width: 20%">
                                                        Candidate Name
                                                    </th>
                                                    <th style="width: 30%">
                                                        Candidate E-mail
                                                    </th>
                                                    <th>
                                                        Linkedin Profile
                                                    </th>
                                                    <th style="width: 8%" class="text-center">
                                                        Status
                                                    </th>
                                                    <th style="width: 20%">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($listEvaluationTest as $key => $list)
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            {{$list->candidate_name}}
                                                        </a>
                                                        <br />
                                                        <small>
                                                            
                                                        </small>
                                                    </td>
                                                    <td>
                                                        {{ $list->candidate_email }}
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="">
                                                        
                                                        {{ $list->url_link }}
                                                        
                                                            <!-- <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                                                aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                                            </div> -->
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-danger">Unresponded</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="{{ route('evaluationshow' , $list->id_evaluation) }}">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="{{ route('evaluationedit' , $list->id_evaluation) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </section>

                        </div>
                    </div>
                </div>
            </div>
    </div>   
</x-app-layout>
