@extends('dashboard.master')
@section('content')
<div class="container-fluid">

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Notice<h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                <li class="breadcrumb-item active">Add Content </li>
            </ol>
            <a href="{{ route('notice.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
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

                @if ($notice)
                    <form class="m-t-40" method="post" action="{{ route('notice.update',$notice->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form method="post" action="{{ route('notice.store') }}" enctype="multipart/form-data">
                @endif
                @csrf


                <div class="row list-of-items">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Title</h4>
                                    <input type="text" name = "name" class="form-control form-control-line" value="{{ $notice->name ?? '' }}" required>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Content Upload</h4>
                                <label for="input-file-now">Please select your content.</label>
                                <input type="file" name="content" id="input-file-now" class="dropify" data-default-file="{{ $notice->content ?? '' }}"/>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Date</h4>
                                    <input type="date" name = "fordate" class="form-control form-control-line" value="{{ $notice->fordate ?? '' }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Content Type</h4>
                                    <select name="contentType"  class="form-control form-control-line" id="">

                                        @if ($notice)
                                            @if ($notice->contentType == 1)
                                                <option value="1" selected>Image</option>
                                                <option value="0">PDF</option>
                                            @elseif ($notice->contentType == 0)
                                                <option value="1">Image</option>
                                                <option value="0" selected>PDF</option>
                                            @endif
                                        @else
                                            <option>--Please Select Content Type--</option>
                                            <option value="1">Image</option>
                                            <option value="0">PDF</option>
                                        @endif

                                    </select>
                                </div>
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



