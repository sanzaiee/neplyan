@extends('dashboard.master')
@section('content')
<div class="container-fluid">

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Term<h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                <li class="breadcrumb-item active">Add Content </li>
            </ol>
            <a href="{{ route('term.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
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

                @if ($term)
                    <form class="m-t-40" method="post" action="{{ route('term.update',$term->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Feature Status</h4>
                            <select name="status" id="" class="form-control form-control-line">
                                @if ($term->status == 1)
                                    <option value="1" selected> Active</option>
                                    <option value="0">In Active</option>
                                @elseif ($term->status == 0)
                                    <option value="1"> Active</option>
                                    <option value="0" selected>In Active</option>
                                @endif
                            </select>
                        </div>
                    </div>
                @else
                    <form method="post" action="{{ route('term.store') }}" enctype="multipart/form-data">
                @endif

                @csrf

                <div class="row list-of-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Title</h4>
                                    <input type="text" name = "title" class="form-control form-control-line" value="{{ $term->title ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Description</h4>
                                <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                    {!! $term->description ?? '' !!}
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



