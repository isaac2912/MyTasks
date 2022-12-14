@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@php

$allUsersInfo = [];

foreach ($users as $k => $v) {
    $allUsersInfo[$v['id']] = $v;
}
@endphp
@section('content')
    <style>
        .row-active {
            background: #556ee6;
            color: #fff;
        }

        .row-active h5,
        .row-active p {
            color: #fff !important;
        }

    </style>
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="media">
                                        <div class="mr-3">
                                            @if (Auth::user()->profile_pic != '')
                                                <img src="{{ asset('assets/users/' . Auth::user()->profile_pic) }}" alt=""
                                                    class="avatar-md rounded-circle img-thumbnail">
                                            @else
                                                <img src="{{ asset('assets/users/profile.png') }}" alt=""
                                                    class="avatar-md rounded-circle img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="text-muted">
                                                <p class="mb-2">Welcome to {{ config('app.name') }} dashboard
                                                </p>
                                                <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                                {{-- <p class="mb-0">UI / UX Designer</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 align-self-center">
                                    <div class="text-lg-center mt-4 mt-lg-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Tasks</p>
                                                    <h5 class="mb-0">{{ $total_tasks }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Projects</p>
                                                    <h5 class="mb-0">{{ $total_projects }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Goals</p>
                                                    <h5 class="mb-0">{{ $total_goals }}</h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-lg-4 d-none d-lg-block">
                                    <div class="clearfix  mt-4 mt-lg-0">
                                        <div class="dropdown float-right">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bxs-cog align-middle mr-1"></i> Setting
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                {{-- <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="card-title mb-4">Top Projects</h4>
                            </div>

                            <div class="text-muted text-center mb-4">
                                <h4 class="mb-4">Projects Progress</h4>
                                <h4></h4>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-centered mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="font-size-14 mb-1">Project A</h5>
                                                <p class="text-muted mb-0">Neque quis est</p>
                                            </td>

                                            <td>
                                                <div id="radialchart-1" class="apex-charts"></div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-1">Completed</p>
                                                <h5 class="mb-0">37 %</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-size-14 mb-1">Project B</h5>
                                                <p class="text-muted mb-0">Quis autem iure</p>
                                            </td>

                                            <td>
                                                <div id="radialchart-2" class="apex-charts"></div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-1">Completed</p>
                                                <h5 class="mb-0">72 %</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-size-14 mb-1">Project C</h5>
                                                <p class="text-muted mb-0">Sed aliquam mauris.</p>
                                            </td>

                                            <td>
                                                <div id="radialchart-3" class="apex-charts"></div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-1">Completed</p>
                                                <h5 class="mb-0">54 %</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-6">
                    <div class="row">
                        {{-- <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs mr-3">
                                            <span
                                                class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                                <i class="bx bx-copy-alt"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">Orders</h5>
                                    </div>
                                    <div class="text-muted mt-4">
                                        <h4>1,452 <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
                                        <div class="d-flex">
                                            <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span
                                                class="ml-2 text-truncate">From previous period</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs mr-3">
                                            <span
                                                class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                                <i class="bx bx-archive-in"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">Revenue</h5>
                                    </div>
                                    <div class="text-muted mt-4">
                                        <h4>$ 28,452 <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
                                        <div class="d-flex">
                                            <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span
                                                class="ml-2 text-truncate">From previous period</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-6">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="clearfix col-md-6">
                                            <h4 class="card-title mb-4">Levels</h4>
                                        </div>
                                        <div class="clearfix col-md-6">
                                            <h4 class="card-title mb-4">
                                                My Points
                                                @if (Auth::user()->my_points > 0)
                                                    {{ Auth::user()->my_points }}
                                                @else
                                                    0
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-centered mb-0">
                                            <tbody>
                                                <tr @if (Auth::user()->my_points <= 100) class="row-active" @endif>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1">Level 1</h5>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-1 text-center"><img
                                                                src="{{ asset('assets/levels/level-1.png') }}" alt=""
                                                                height="50" width="50"
                                                                style="object-fit: cover"><br><b>Scavenger</b></p>
                                                    </td>
                                                </tr>

                                                <tr @if (Auth::user()->my_points >= 101 && Auth::user()->my_points <= 150) class="row-active" @endif>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1">Level 2</h5>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-1 text-center"><img
                                                                src="{{ asset('assets/levels/level-2.png') }}" alt=""
                                                                height="50" width="50"
                                                                style="object-fit: cover"><br><b>Warrior</b></p>
                                                    </td>
                                                </tr>

                                                <tr @if (Auth::user()->my_points >= 151 && Auth::user()->my_points <= 200) class="row-active" @endif>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1">Level 3</h5>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-1 text-center"><img
                                                                src="{{ asset('assets/levels/level-3.png') }}" alt=""
                                                                height="50" width="50"
                                                                style="object-fit: cover"><br><b>Quick Witted</b></p>
                                                    </td>
                                                </tr>

                                                <tr @if (Auth::user()->my_points >= 201 && Auth::user()->my_points <= 250) class="row-active" @endif>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1">Level 4</h5>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-1 text-center"><img
                                                                src="{{ asset('assets/levels/level-4.png') }}" alt=""
                                                                height="50" width="50"
                                                                style="object-fit: cover"><br><b>Maestro</b></p>
                                                    </td>
                                                </tr>

                                                <tr @if ((Auth::user()->my_points >= 251 && Auth::user()->my_points <= 300) || Auth::user()->my_points > 300) class="row-active" @endif>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1">Level 5</h5>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-1 text-center"><img
                                                                src="{{ asset('assets/levels/level-5.png') }}" alt=""
                                                                height="50" width="50"
                                                                style="object-fit: cover"><br><b>Conquerer</b></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="clearfix col-md-6">
                                            <h4 class="card-title mb-4">Leaderboard</h4>
                                        </div>
                                        <div class="clearfix col-md-6 text-right">
                                            <h4 class="card-title mb-4">Projects</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-centered mb-0">
                                            <tbody>
                                                @foreach ($projects as $project)
                                                    <tr>
                                                        <td>
                                                            <div class="mr-3">
                                                                @if ($allUsersInfo[$project->userId]['profile_pic'] != '')
                                                                    <img src="{{ asset('assets/users/' . $allUsersInfo[$project->userId]['profile_pic']) }}"
                                                                        alt="" class="avatar-md rounded-circle img-thumbnail">
                                                                @else
                                                                    <img src="{{ asset('assets/users/profile.png') }}" alt=""
                                                                        class="avatar-md rounded-circle img-thumbnail">
                                                                @endif
                                                            </div>
                                                            <h5 class="font-size-14 mb-1">
                                                                {{ $allUsersInfo[$project->userId]['name'] }}</h5>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-1 text-right">
                                                                <b>
                                                                    @if ($project->total > 0)
                                                                        {{ $project->total }}
                                                                    @else
                                                                        0
                                                                    @endif
                                                                </b>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs mr-3">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                                            <i class="bx bx-purchase-tag-alt"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">Average Price</h5>
                                    </div>
                                    <div class="text-muted mt-4">
                                        <h4>$ 16.2 <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>

                                        <div class="d-flex">
                                            <span class="badge badge-soft-warning font-size-12"> 0% </span> <span
                                                class="ml-2 text-truncate">From previous period</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- end row -->
                </div>
                <div class="col-xl-6">
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="clearfix col-md-6">
                                    <h4 class="card-title mb-4">Leaderboard</h4>
                                </div>
                                <div class="clearfix col-md-6 text-right">
                                    <h4 class="card-title mb-4">Points</h4>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-centered mb-0">
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="mr-3">
                                                        @if ($user->profile_pic != '')
                                                            <img src="{{ asset('assets/users/' . $user->profile_pic) }}"
                                                                alt="" class="avatar-md rounded-circle img-thumbnail">
                                                        @else
                                                            <img src="{{ asset('assets/users/profile.png') }}" alt=""
                                                                class="avatar-md rounded-circle img-thumbnail">
                                                        @endif
                                                    </div>
                                                    <h5 class="font-size-14 mb-1">{{ $user->name }}</h5>
                                                </td>
                                                <td>
                                                    <p class="text-muted mb-1 text-right">
                                                        <b>
                                                            @if ($user->my_points > 0)
                                                                {{ $user->my_points }}
                                                            @else
                                                                0
                                                            @endif
                                                        </b>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Projects</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Category</th>
                                            <th>Project Budget</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>My Task</td>
                                            <td>
                                                Website Development
                                            </td>
                                            <td>
                                                $400
                                            </td>
                                            <td>
                                                07 Oct, 2019
                                            </td>
                                            <td>
                                                07 Oct, 2020
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                    data-toggle="modal" data-target=".exampleModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>

                </div>
            </div> --}}
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
