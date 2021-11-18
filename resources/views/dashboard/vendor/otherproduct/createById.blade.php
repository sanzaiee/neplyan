@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Product of {{ $other->name }}<h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('otherproductBy.user') }} ">All Other Products</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row list-of-items">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create content</h4>
                    <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>
                    <form method="post" action="{{ route('otherProductBy.user.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row lsit-of-items">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Image</h4>
                                        <label for="input-file-now">Please select your image.</label>
                                        <input type="file" name="image" id="input-file-now" class="dropify" data-default-file=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Product Name</h4>
                                            <input type="text" name = "name" class="form-control form-control-line" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Price </h4>
                                            <input type="text" name ="price" class="form-control form-control-line" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Author Name </h4>
                                            <input type="text" name ="author" class="form-control form-control-line"  required>
                                        </div>


                                        <input type="hidden" name="other_id" value="{{ $other->id }}">
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Description</h4>
                                        <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>



</div>
@endsection






