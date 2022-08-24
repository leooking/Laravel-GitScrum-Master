@section('title',  trans('Sprints'))

@extends('layouts.master')

@section('breadcrumb')

<div class="col-sm-10">
    <h2>{{$user->username}}</h2>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a href="{{route('user.profile', ['username' => $user->username])}}">{{trans('Profile')}}</a></li>
        <li class="active"><strong>{{trans('Issues')}}</strong></li>
    </ol>
</div>

@endsection

@section('content')

    @include('partials.header-user', ['user' => $user])

    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Line Chart Example </h5>
            </div>
                <div id="morris-area-chart"></div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>All projects assigned to this account</h5>
                <div class="ibox-tools">
                    <a href="" class="btn btn-primary btn-xs">{{trans('Add a New')}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">

                <div class="m-b-lg">

                    <div class="input-group">
                        <input type="text" placeholder="Search issue by name..." class=" form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-white"> Search</button>
                        </span>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-hover issue-tracker">
                        <tbody>
                        @each('partials.lists.issues', $issues, 'list', 'partials.lists.no-items')
                        </tbody>
                    </table>
                </div>

                {{ $issues->links() }}

            </div>

        </div>
    </div>

<script>
$(function(){

    Morris.Area({
        element: 'morris-area-chart',
        data: [
            @foreach($user->burndown() as $key=>$value)
            { period: '{{$key}}', issues: '{{$value}}' },
            @endforeach
        ],
        xkey: 'period',
        ykeys: ['issues'],
        labels: ['Issues Remaining'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        lineColors: ['#87d6c6', '#54cdb4','#1ab394'],
        lineWidth:4,
        pointSize:4,
    });

})
</script>

@endsection
