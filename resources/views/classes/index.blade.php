@extends('layouts.app')
@section('title', 'Class')
@push('js')
    <script>
        $(document).ready(function() {
            var maxHeight = 0;
            $('.card').each(function() {
                var currentHeight = $(this).outerHeight();
                if (currentHeight > maxHeight) {
                    maxHeight = currentHeight;
                }
            });
            $('.card').css('height', maxHeight + 'px');
        });
    </script>
@endpush
@section('content')
    <div class="mb-3">
        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">
            <span class="mdi mdi-plus btn-label"></span> Create
        </button>

        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <form action="{{ route('class.store') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Class</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">ClassName</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Classname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="teacher_id" class="form-label">Teacher</label>
                                        <select class="form-control" name="teacher_id" id="teacher_id">
                                            <option value="">- Select Teacher -</option>
                                            @foreach ($teacher as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="skill_competency_id" class="form-label">Skill Competency</label>
                                        <select class="form-control" name="skill_competency_id" id="skill_competency_id">
                                            <option value="">- Select Teacher -</option>
                                            @foreach ($skill_competencies as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($classes as $data)
            <div class="col-xl-4">
                <div class="card">
                    <div class="text-center card-body d-flex flex-column">
                        <div class="d-flex">
                            <img src="{{ $data->Teacher->profile }}" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                            <div class="text-start ms-3">
                                <p class="text-muted font-13"><strong>Name :</strong> <span>{{ $data->Teacher->name }}</span></p>
                                <p class="text-muted font-13"><strong>Class :</strong> <span>{{ $data->name }}</span></p>
                                <p class="text-muted font-13"><strong>Skill Competency :</strong> <span>{{ $data->SkillCompetency->name }}</span></p>
                            </div>

                        </div>
                        <div class="mt-auto">
                            <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light w-100">
                                <span class="mdi mdi-table-account"></span> Enter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
