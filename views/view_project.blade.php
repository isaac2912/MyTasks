@extends('layouts.master')
@section('title')
    View Project
@endsection
@section('content')
    <div class="container-fuild mt-5" style="">
        <div class="row">
            <div class="col-md-12 p-3 mt-5">
                <div class="card col-md-6 mx-auto">
                    <div class="card-header mt-2 row mx-1">
                        <b class="col-8">{{ ucwords($task['title']) }}</b>
                        <b class="col-4 text-right"><a href="{{ route('view_all_projects') }}"><i class="bx bx-arrow-back "></i> Go back </a></b>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="task_title">You can Earn Points : {{ $task->points }} </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            @if ($task->status == 'Completed')
                            <p><button class="btn btn-success" disabled>Mark As Completed</button></p>
                            @else
                            <p><a href="{{ route('mark_as_completed_task', $task['id']) }}" class="btn btn-success">Mark As Completed</a></p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
