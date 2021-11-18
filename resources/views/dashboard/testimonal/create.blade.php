@extends('dashboard.master')
@section('content')
<div class="container-fluid">

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Testimonal<h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                <li class="breadcrumb-item active">Add Content </li>
            </ol>
            <a href="{{ route('testimonal.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-arrow-up"></i>All Content</button></a>
        </div>
    </div>
</div>
<div class="row list-of-items">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create content</h4>
                <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>

                @if ($testimonal)
                    <form class="m-t-40" method="post" action="{{ route('testimonal.update',$testimonal->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="card">
                        <div class="body m-3">
                            <h4 class="card-title">Feature Status</h4>
                            <select name="status" id="" class="form-control form-control-line">
                                @if ($testimonal->status == 1)
                                    <option value="1" selected> Active</option>
                                    <option value="0">In Active</option>
                                @elseif ($testimonal->status == 0)
                                    <option value="1"> Active</option>
                                    <option value="0" selected>In Active</option>
                                @endif
                            </select>
                        </div>
                    </div>

                @else
                    <form method="post" action="{{ route('testimonal.store') }}" enctype="multipart/form-data">
                @endif
                @csrf


                <div class="row list-of-items">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Name</h4>
                                    <input type="text" name = "name" class="form-control form-control-line" value="{{ $testimonal->name ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Post</h4>
                                    <input type="text" name = "post" class="form-control form-control-line" value="{{ $testimonal->post ?? '' }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image Upload</h4>
                                <label for="input-file-now">Please select you image.</label>
                                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $testimonal->image ?? '' }}"/>
                            </div>
                        </div>



                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Message</h4>
                                <textarea name="message" id="description-ckeditor" class="ckeditor" required>
                                    {!! $testimonal->message ?? '' !!}
                                </textarea>
                            </div>
                        </div>
                    </div>

                </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection



