@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Guideline Section<h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Add Content </li>
                </ol>
                <a href="{{ route('guideline.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
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

                    @if ($guideline)
                        <form class="m-t-40" method="post" action="{{ route('guideline.update',$guideline->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feature Status</h4>
                                <select name="status" id="" class="form-control form-control-line">
                                    @if ($guideline->status == 1)
                                        <option value="1" selected> Active</option>
                                        <option value="0">In Active</option>
                                    @elseif ($guideline->status == 0)
                                        <option value="1"> Active</option>
                                        <option value="0" selected>In Active</option>
                                    @endif
                                </select>
                            </div>
                        </div>


                    @else
                        <form method="post" action="{{ route('guideline.store') }}" enctype="multipart/form-data">
                    @endif

                    @csrf

                    <div class="row list-of-items">

                            <div class="col-12 card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">First Title</h4>
                                        <input type="text" name = "title1" class="form-control form-control-line"  value="{{ $guideline->title1 ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                       

                            <div class="col-12 card">

                                <div class="card-body">
                                    <h4 class="card-title">First Description</h4>
                                    <textarea name="description1" id="description-ckeditor" class="ckeditor" required>
                                        {!! $guideline->description1 ?? '' !!}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-12 card">

                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Second Title</h4>
                                        <input type="text" name = "title2" class="form-control form-control-line"  value="{{ $guideline->title2 ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                     
                         

                            <div class="col-12 card">

                                <div class="card-body">
                                    <h4 class="card-title">Second Description</h4>
                                    <textarea name="description2" id="description-ckeditor" class="ckeditor" required>
                                        {!! $guideline->description2 ?? '' !!}
                                    </textarea>
                                </div>
                            </div>


                            <div class="col-12 card">

                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Third Title</h4>
                                        <input type="text" name = "title3" class="form-control form-control-line"  value="{{ $guideline->title3 ?? '' }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 card">

                                <div class="card-body">
                                    <h4 class="card-title">Third Description</h4>
                                    <textarea name="description3" id="description-ckeditor" class="ckeditor" required>
                                        {!! $guideline->description3 ?? '' !!}
                                    </textarea>
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



