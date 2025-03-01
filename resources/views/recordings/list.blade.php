<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recordings List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Tabela para Gravações de Accountance -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Accountance Recordings</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">Practice Test</th>
                                                <th style="width: 30%">Question</th>
                                                <th>Recorded Audio</th>
                                                <th style="width: 8%" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recordinglistAccountance as $key => $recording)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $recording['practice_test_name'] }}</td>
                                                    <td>{{ $recording['question_text'] }}</td>
                                                    <td>
                                                        <audio controls>
                                                            <source src="{{ asset('storage/' . $recording['recorded_audio']) }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="{{ asset('storage/' . $recording['recorded_audio']) }}" download>
                                                            <i class="fas fa-download"></i> Download
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tabela para Gravações de Aviation -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Aviation Recordings</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">Practice Test</th>
                                                <th style="width: 30%">Question</th>
                                                <th>Recorded Audio</th>
                                                <th style="width: 8%" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recordinglistAviation as $key => $recording)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $recording['practice_test_name'] }}</td>
                                                    <td>{{ $recording['question_text'] }}</td>
                                                    <td>
                                                        <audio controls>
                                                            <source src="{{ asset('storage/' . $recording['recorded_audio']) }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="{{ asset('storage/' . $recording['recorded_audio']) }}" download>
                                                            <i class="fas fa-download"></i> Download
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>