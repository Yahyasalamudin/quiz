@extends('layouts.app')
@section('title', 'Quiz')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="font-weight-bold">Quizzes</h5>
                        <a href="{{ route('quiz.create') }}" class="btn btn-purple rounded-pill waves-effect waves-light mb-2">
                            <i class="mdi mdi-plus"></i> Create
                        </a>
                    </div>
                    <table id="datatable" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Teacher
                                </th>
                                <th>
                                    Class
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $quiz->title }}
                                    </td>
                                    <td>
                                        {{ $quiz->description }}
                                    </td>
                                    <td>
                                        {{ $quiz->Teacher->name ?? '-' }}
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        });

        var channel = pusher.subscribe('new-quiz');
        channel.bind('App\\Events\\NewQuiz', function(data) {
            var response = data.quiz
            var table = $('#datatable').DataTable();

            table.row.add([
                table.rows().count() + 1,
                response.title,
                response.description,
                response.teacher.name || '-',
                response.class || '-'
            ]).draw(false);
        });
    </script>
@endpush
