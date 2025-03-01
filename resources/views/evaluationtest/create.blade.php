<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Evaluation Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Breadcrumb -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <!-- Optional: Add a title here if needed -->
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item">
                                            <a href="{{ asset('evaluationtest') }}">Tests</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Main Form -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">New Evaluation Test</h3>
                                            <h5 class="card-title float-right">From: {{ auth()->user()->name }}</h5>
                                        </div>
                                        <form method="POST" action="{{ route('evaluationstore') }}" id="createtest">
                                            @csrf
                                            <div class="card-body">
                                                <!-- Candidate Name -->
                                                <div class="form-group">
                                                    <label for="candidate_name">To: Candidate / Student Name</label>
                                                    <input type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Enter name" required>
                                                </div>

                                                <!-- Candidate Email -->
                                                <div class="form-group">
                                                    <label for="candidate_email">Email Address</label>
                                                    <input type="email" class="form-control" id="candidate_email" name="candidate_email" placeholder="Enter email" required>
                                                </div>

                                                <!-- LinkedIn Profile -->
                                                <div class="form-group">
                                                    <label for="url_link">LinkedIn Profile (URL)</label>
                                                    <input type="text" class="form-control" id="url_link" name="url_link" placeholder="Enter LinkedIn Profile Link">
                                                </div>

                                                <!-- Phone Number -->
                                                <div class="form-group">
                                                    <label for="phone_number">Phone Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <select name="country_code" id="country_code" class="form-control">
                                                                @foreach($countrycode as $key => $code)
                                                                    <option value="{{ $code->data_countrycode }}">
                                                                        {{ $code->country_name }} (+{{ $code->data_countrycode }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
                                                    </div>
                                                </div>

                                                <!-- English Level Template -->
                                                <div class="form-group">
                                                    <label for="selectenglishlevel">English Level Template</label>
                                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="These templates are pre-selected questions from our database"></i>
                                                    <select class="form-control" id="selectenglishlevel" name="selectenglishlevel" required>
                                                        <option value="" selected disabled>Select an English Level</option>
                                                        @foreach($testtypes as $key => $level)
                                                            <option value="{{ $level['id_test_type'] }}">
                                                                {{ $level['test_level'] }} - {{ $level['test_type_name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Questions List -->
                                                <div class="form-group">
                                                    <label for="questionsperlevel">Select Questions</label>
                                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Select questions for the test"></i>
                                                    <div class="input-group" style="height: 10em; overflow-y: auto;">
                                                        <ul class="list-group" id="questionsperlevel" style="width: 100%;">
                                                            <!-- Questions will be dynamically populated here -->
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Notes -->
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <!-- Form Footer -->
                                            <div class="card-footer">
                                                <input type="hidden" name="id_et_creation_user" value="{{ auth()->user()->id }}">
                                                <button type="submit" class="btn btn-outline-primary" id="createtest">Create Test</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // AJAX Setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fetch Questions on English Level Change
            $('#selectenglishlevel').on('change', function(e) {
                var id_test_type = e.target.value;
                $.ajax({
                    url: "{{ route('getquestionlist') }}",
                    type: "POST",
                    data: { id_test_type: id_test_type },
                    success: function(data) {
                        var questionsList = $('#questionsperlevel');
                        questionsList.empty(); // Clear previous questions
                        $.each(data, function(i, val) {
                            $.each(data[i], function(j, v) {
                                var li = $('<li>').addClass('list-group-item').css({ margin: 0, padding: 0 });
                                var input = $('<input>').attr({
                                    type: 'checkbox',
                                    value: v.id_question,
                                    id: 'questionoption',
                                    class: 'mr-2'
                                });
                                li.append(input).append(v.question_text);
                                questionsList.append(li);
                            });
                        });
                    }
                });
            });

            // Tooltip Initialization
            $('[data-toggle="tooltip"]').tooltip();

            // Handle Form Submission
            $('#createtest').on('submit', function(e) {
                var selectedQuestions = $('input[id="questionoption"]:checked');
                if (selectedQuestions.length === 0) {
                    alert("Please select at least one question.");
                    e.preventDefault();
                } else if (selectedQuestions.length > 10) {
                    alert("You can select a maximum of 10 questions.");
                    e.preventDefault();
                } else {
                    selectedQuestions.each(function() {
                        var input = $('<input>').attr({
                            type: 'hidden',
                            name: 'id_question[]',
                            value: $(this).val()
                        });
                        $('#createtest').append(input);
                    });
                }
            });
        });
    </script>
</x-app-layout>