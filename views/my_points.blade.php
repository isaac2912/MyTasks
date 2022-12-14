@extends('layouts.master')
@section('title')
    My Points
@endsection
@section('content')
    <div class="container-fuild mt-5" style="">
        <div class="row">
            <div class="col-md-12 p-3 mt-5">
                <div class="card col-md-6 mx-auto">
                    <div class="card-header mt-2 row mx-1">
                        <b class="col-8">{{ ucwords('my points') }}</b>
                        {{-- <b class="col-4 text-right"><a href="{{ route('view_all_tasks') }}"><i class="bx bx-arrow-back "></i> Go back </a></b> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                        <div class="form-group col-8 pt-2">
                                            <label for="task_title">Total Points : {{ $user['my_points'] }} </label>
                                            {{-- <label for="task_title">Total Points : {{ $user->my_points }} </label> --}}
                                            {{-- {{ dd($user) }} --}}
                                        </div>
                                        <div class="col-4 text-right pr-3">
                                            @if ($user['my_points'] <= 100)
                                            <img src="{{ asset('assets/levels/level-1.png') }}" alt="" height="50" width="50" style="object-fit: cover">
                                            <br><b>Scavenger</b>
                                            @elseif ($user['my_points'] >= 101 && $user['my_points'] <=150)
                                            <img src="{{ asset('assets/levels/level-2.png') }}" alt="" height="50" width="50" style="object-fit: cover">
                                            <br><b>Warrior</b>
                                            @elseif ($user['my_points'] >= 151 && $user['my_points'] <=200)
                                            <img src="{{ asset('assets/levels/level-3.png') }}" alt="" height="50" width="50" style="object-fit: cover">
                                            <br><b>Quick Witted</b>
                                            @elseif ($user['my_points'] >= 201 && $user['my_points'] <=250)
                                            <img src="{{ asset('assets/levels/level-4.png') }}" alt="" height="50" width="50" style="object-fit: cover">
                                            <br><b>Maestro</b>
                                            @elseif ($user['my_points'] >= 251 && $user['my_points'] <=300 || $user['my_points'] >300)
                                            <img src="{{ asset('assets/levels/level-5.png') }}" alt="" height="50" width="50" style="object-fit: cover">
                                            <br><b>Conquerer</b>
                                            @endif
                                        </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
