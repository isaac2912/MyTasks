@extends('layouts.master')
@section('title')
    Goals
@endsection
@section('content')
    <style>
        .table-responsive {
            height: 200px;
            overflow-y: scroll;
        }

        thead tr:nth-child(1) th {
            background: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }

    </style>
    <div class="container-fuild mt-5" style="">
        <div class="row mt-5 mb-3">&nbsp;</div>
        @if (session()->has('message'))
            <div class="alert alert-success mt-5 w-75 mx-auto">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row col-md-8 mx-auto">

            <div class="table-responsive border">
                <table class="table table-hover" id="job-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Goals</th>
                            <th>Points</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $i=1;
                            ?>
                        @foreach ($goals as $row)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <td>{{ $row['title'] }}</td>
                                <td>{{ $row['points'] }}</td>
                                <td>
                                    <a href="{{ route('view_task', $row['id']) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('edit_task', $row['id']) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('delete_task', $row['id']) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12 p-3 mt-5">
            <div class="card col-md-6 mx-auto">
                <div class="card-header mt-2">
                    <b>Add Tasks</b>
                </div>
                <div class="card-body">
                    <form method="Post" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="task_title">Task Title </label>
                                            <input type="text" class="form-control" name="title" id="task_title"
                                                placeholder="Task Title Here">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="task_points">Task Points </label>
                                            <input type="number" class="form-control" name="points" id="task_points"
                                                placeholder="Task Points Here">
                                        </div>
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                        <input type="hidden" name="userId" value="{{ Auth::user()->id }}" hidden>
                        <input type="hidden" name="category" value="Goal" hidden>
                        <p><input class="btn btn-success" type="submit" value="submit"> </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
