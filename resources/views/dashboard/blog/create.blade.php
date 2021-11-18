@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Blog </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Blog </li>
                </ol>
                <a href="{{ route('blog.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-arrow-up"></i> All Content</button></a>
            </div>
        </div>
    </div>
<div class="list-of-items">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blog</h4>
               
                @if ($blog)
                    <form class="m-t-40" method="post" action="{{ route('blog.update',$blog->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf
                <div class="row list-of-items">
                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Title</h4>
                                    <input type="text" name = "name" class="form-control form-control-line"  value="{{ $blog->name ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                <label for="input-file-now">Please select your image.</label>
                                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $blog->image ?? '' }}"/>
                            </div>
                        </div>

                        @if ($blog)
                        <div class="card">
                            <div class="body">
                                <h4 class="card-title">Feature Status</h4>
                                <select name="status" id="" class="form-control form-control-line">
                                        @if ($blog->status == 1)
                                            <option value="1" selected> Active</option>
                                            <option value="0">In Active</option>
                                        @elseif ($blog->status == 0)
                                            <option value="1"> Active</option>
                                            <option value="0" selected>In Active</option>
                                        @endif
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Tags</h4>
                                    <select class="form-control form-control-line" name="tag_id" id="">
                                        @if ($blog)
                                            <option value="{{ $blog->tag_id }}"> {{ $tag_name }} </option>
                                            @foreach ($tags as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach
                                        @else
                                            @foreach ($tags as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach
                                        @endif

                                    </select>
                                    {{-- <input type="text" name = "name" class="form-control form-control-line"  value="{{ $blog->title ?? '' }}" required> --}}
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Short Description</h4>
                                <textarea name="short_description" id="description-ckeditor" class="ckeditor" required>
                                    {!! $blog->short_description ?? '' !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Description</h4>
                                <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                    {!! $blog->description ?? '' !!}
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

@endsection
