@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row  page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Advertisment </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Create About Us </li>
                </ol>
                <a href="{{ route('advertise.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15">
                <i class="fa fa-arrow-up"></i> All About Us</button></a>
            </div>
        </div>
    </div>
    <div class="list-of-items">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Advertisment List</h4>
                

                    @if ($about)
                        <form class="m-t-40" method="post" action="{{ route('advertise.update',$about->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                    @else
                        <form method="post" action="{{ route('advertise.store') }}" enctype="multipart/form-data">
                    @endif
                        @csrf
                    <div class="row list-of-items">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Name</h4>
                                        <input type="text" name = "name" class="form-control form-control-line"  value="{{ $about->name ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        <div class="col-lg-4 col-md-4">

                             <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Placement</h4>
                                        
                                        <select name="placement" id="" class="form-control form-control-line" required>
                                            <option>--choose placement--</option>
                                                <option value="home" @if($about && $about->placement == "home") selected @endif> Home</option>
                                                <option value="client" @if($about && $about->placement == "client") selected @endif>Client Dashboard</option>
                                                <option value="seller" @if($about && $about->placement == "seller") selected @endif>Seller Dashboard</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        <div class="col-lg-4 col-md-4">


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Image</h4>
                                    <label for="input-file-now">Please select your image.</label>
                                    <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $about->image ?? '' }}"/>
                                </div>
                            </div>
                            
                            </div>
                            @if($about)
                            
                    <div class="col-lg-4 col-md-4">

                                <div class="card">
                                    <div class="body">
                                        <h4 class="card-title">Feature Status</h4>
                                        <select name="status" id="" class="form-control form-control-line">
                                            @if ($about->status == 1)
                                                <option value="1" selected> Active</option>
                                                <option value="0">In Active</option>
                                            @elseif ($about->status == 0)
                                                <option value="1"> Active</option>
                                                <option value="0" selected>In Active</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                </div>
                            @endif

                        </div>

                    </div>


                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>
</div>


</div>

@endsection
