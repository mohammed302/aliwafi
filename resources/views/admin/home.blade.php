@extends('admin.app')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}"> </a>
    </li>
    <li>الرئيسية</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <!-- BEGIN PAGE BASE CONTENT -->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 blue">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$admins}}">0</span>
                    </div>
                    <div class="desc">مدارء الموقع </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 red">
                <div class="visual">
                    <i class="fa fa-book"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$orders}}">0</span></div>
                    <div class="desc"> المسجلين</div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2  purple">
                <div class="visual">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$areas}}">0</span></div>
                    <div class="desc"> المناطق</div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 green">
                <div class="visual">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$cities}}">0</span></div>
                    <div class="desc"> المدن </div>
                </div>

            </div>
        </div>

    </div>

    @endsection
