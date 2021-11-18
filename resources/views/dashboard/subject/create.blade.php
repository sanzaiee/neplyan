@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Subject </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Subject </li>
                </ol>
                <a href="{{ route('subject.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-arrow-up"></i> All Content</button></a>
            </div>
        </div>
    </div>
    <div class="list-of-items">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">subject</h4>
            <h6 class="card-subtitle">
                @include('message')
            </h6>

            @if ($subject)
                <form class="m-t-40" method="post" action="{{ route('subject.update',$subject->id ) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
            @else
                <form method="post" action="{{ route('subject.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
            <div class="row list-of-items">
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Subject Name</h4>
                                <input type="text" name = "name" class="form-control form-control-line"  value="{{ $subject->name ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Image</h4>
                            <label for="input-file-now">Please select your image.</label>
                            <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $subject->image ?? '' }}"/>
                        </div>
                    </div>



                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="row list-of-items">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Education</h4>
                                        <select class="form-control form-control-line" name="education_id" id="">
                                            @foreach ($education as $item)
                                                <option value="{{ $item->id }}" @if($subject && $subject->education_id == $item->id) selected @endif> {{ $item->name }}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>









                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Level</h4>
                                        <select class="form-control form-control-line" name="level_id" id="">
                                            @foreach ($levels as $item)
                                            <option value="{{ $item->id }}" @if($subject && $subject->level_id == $item->id) selected @endif> {{ $item->name }} </option>
                                         @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Materials</h4>
                                        <select class="form-control form-control-line" name="material_id" id="">
                                            @foreach ($materials as $item)
                                            <option value="{{ $item->id }}" @if($subject && $subject->material_id == $item->id) selected @endif> {{ $item->name }} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Semesters</h4>
                                        <select class="form-control form-control-line" name="semester_id" id="">
                                            @foreach ($semesters as $item)
                                                <option value="{{ $item->id }}" @if($subject && $subject->semester_id == $item->id) selected @endif> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Price </h4>
                                    <input type="text" name ="price" class="form-control form-control-line"  value="{{ $subject->price ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Auther Name </h4>
                                    <input type="text" name ="author" class="form-control form-control-line"  value="{{ $subject->auther ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>



                    @if($subject)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Status </h4>
                                        <select name="status" class="form-control" id="status">
                                            @if(old('status')=="")
                                            <option value="1" @if($subject->status== 1) selected="selected" @endif>Active</option>
                                            <option value="0" @if($subject->status== 0) selected="selected" @endif>Inactive</option>
                                            @else
                                            <option value="1" @if(old('status')== 1) selected="selected" @endif>Active</option>
                                            <option value="0" @if(old('status')== 0) selected="selected" @endif>Inactive</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif



                    </div>
                </div>
            </div>


            <div class="row list-of-items">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Description</h4>
                            <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                {!! $subject->description ?? '' !!}
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

@endsection
{{-- <a href="" class="btn btn-rounded btn-danger btn-xs"  onclick="ConfirmDelete({{ $item->id }})">
    <i class="fa fa-trash"></i>
</a> --}}
