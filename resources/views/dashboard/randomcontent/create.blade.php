@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Random Content </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Add Random Content </li>
                </ol>
                <a href="{{ route('random.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-arrow-up"></i> All Content</button></a>
            </div>
        </div>
    </div>
<div class="list-of-items">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Random Contents</h4>
               
                @if ($content)
                    <form class="m-t-40" method="post" action="{{ route('random.update',$content->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form method="post" action="{{ route('random.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf
                <div class="row list-of-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Title</h4>
                                    <input type="text" name = "name" class="form-control form-control-line"  value="{{$content->name ?? ''}}" required>
                                </div>
                            </div>
                        </div>
                        @if($content)
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Content Type</h4>
                                    <select name="content_type" id="" class="form-control form-control-line">
                                            @if ($content->content_type == 1)
                                                <option value="1" selected> Image</option>
                                                <option value="0">Doc/PDf</option>
                                            @elseif ($content->content_type == 0)
                                                <option value="1"> Image</option>
                                                <option value="0" selected>Doc/PDF</option>
                                            @endif
                                    </select>
                                </div>
                            </div>
                        @else
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Content Type</h4>
                                    <select name="content_type" id="" class="form-control form-control-line">
                                        <option value=""> --Please Select Content--</option>
                                        <option value="1"> Image</option>
                                        <option value="0">Doc/PDf</option>
                                    </select>
                                </div>
                            </div>
                        
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Upload Content [Image/PDF/Doc]</h4>
                                <label for="input-file-now">Please select your content.</label>
                                <input type="file" name="content" id="input-file-now" class="dropify" data-default-file="{{asset($content->content ?? 'dummyPdf.png') }}"/>
                            </div>
                        </div>

                        @if ($content)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feature Status</h4>
                                <select name="status" id="" class="form-control form-control-line">
                                        @if ($content->status == 1)
                                            <option value="1" selected> Active</option>
                                            <option value="0">In Active</option>
                                        @elseif ($content->status == 0)
                                            <option value="1"> Active</option>
                                            <option value="0" selected>In Active</option>
                                        @endif
                                </select>
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
