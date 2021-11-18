
@extends('dashboard.master')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard @include('message')</h4>
              <h6 class="card-subtitle">
                </h6>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard </li>
                </ol>
                <a href="{{ route('education.create') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i>Education</button></a>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-user">
        @forelse ($education as $index => $edu)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('add.material',$edu->slug) }}">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <span class="display-5 text-primary"><i class="fa fa-university"></i></span>
                                            <p class="text-muted text-primary">Update Content</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary">{{ $edu->name }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div>

</div>
@endsection
