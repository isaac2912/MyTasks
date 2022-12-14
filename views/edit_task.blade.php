@extends('layouts.master')
@section('title')
    Edit {{ $task['category'] }}
@endsection
@section('content')
{{-- <div class="container-fuild mt-5" style="">
    <div class="row col-md-8 mx-auto">
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Task Points</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                <? $i=1;
                ?>
                @foreach ($tasks as $row)
                <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $row['title'] }}</td>
                    <td>{{ $row['points'] }}</td>
                    <td><a href="{{ route('edit_task', $row['id']) }}" class="btn btn-warning">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div> --}}
    <div class="container-fuild mt-5" style="">
        <div class="row">
            <div class="col-md-12 p-3 mt-5">
                <div class="card col-md-6 mx-auto">
                    <div class="card-header mt-2 row mx-1">
                        <b class="col-8">Add Tasks</b>
                        <b class="col-4 text-right"><a href="{{ route('view_all_tasks') }}"><i class="bx bx-arrow-back "></i> Go back </a></b>
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
                                                <input type="text" class="form-control" name="title" value="{{ $task['title'] }}" id="task_title"
                                                    placeholder="Task Title Here">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="task_points">Task Points </label>
                                                <input type="number" class="form-control" name="points" value="{{ $task['points'] }}" id="task_points"
                                                    placeholder="Task Points Here">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <p><input class="btn btn-success" type="submit" value="submit"> </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
