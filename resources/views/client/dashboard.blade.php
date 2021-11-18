@extends('client.master')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Client Dashboard</h4>
                <h6 class="card-subtitle">
            </h6>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-user">
        <div class="col-md-6">
            <a href="{{ route('course.list') }}">
                <div class="card p-5">
                    <div class="body">
                        <h4 class="card-title text-primary text-center">My Courses</h4>
                        <h6 class="card-subtitle text-center">You have bought <code>{{ $total_products }}</code> Courses.</h6>
                    </div>
                </div>
            </a>
        </div>

        <!--<div class="col-md-4">-->
        <!--    <a href="{{ route('user.faq') }}">-->
        <!--        <div class="card p-5">-->
        <!--            <div class="body">-->
        <!--                <h4 class="card-title text-primary text-center">FAQs</h4>-->
        <!--                <h6 class="card-subtitle text-center">Total FAQs</h6>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </a>-->
        <!--</div>-->

        <div class="col-md-6">
            <a href="{{ route('client.comment') }}">
                <div class="card p-5">
                    <div class="body">
                        <h4 class="card-title text-primary text-center">My Comments</h4>
                        <h6 class="card-subtitle text-center">Your have <code>{{ $total_comments }}</code> comments.</h6>
                    </div>
                </div>
            </a>
        </div>
        

    </div>
    <div class="row banner-new-part mt-3 mb-3">
        <div class="col-md-6">
            <img src="../frontend/image/a1.gif" class="w-100">
        </div>
        <div class="col-md-6">
            <img src="../frontend/image/a1.gif" class="w-100">
        </div>
    </div>



</div>
@endsection
