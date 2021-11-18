{{--
@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
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

    <div class="row page-user">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('product.all') }}">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="display-5 text-primary"><i class="fa fa-university"></i></span>
                                        <p class="text-muted text-primary">Update Content</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">Subject</h2>
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


        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('subject.create') }}">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="display-5 text-primary"><i class="fa fa-university"></i></span>
                                        <p class="text-muted text-primary">Update Content</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">Subject</h2>
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


        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('subject.create') }}">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="display-5 text-primary"><i class="fa fa-university"></i></span>
                                        <p class="text-muted text-primary">Update Content</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">Subject</h2>
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

        @forelse ($education as $index => $edu)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('add.material',$edu->slug) }}">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <span class="display-5 text-primary"><i class="fa fa-university"></i></span>
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
@endsection --}}
@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Product </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Product </li>
                </ol>
                {{-- <a href="{{ route('product.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-arrow-up"></i> All Content</button></a> --}}
            </div>
        </div>
    </div>
    <div class="list-of-items">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product</h4>
            <h6 class="card-subtitle">
               Choose the <code>respective levels</code> to add product.
            </h6>

            <h6 class="card-subtitle">
                @include('message')
            </h6>

            @if ($subject)
                <form class="m-t-40" method="post" action="{{ route('product.update',$subject->id ) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
            @else
                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
            <div class="row list-of-items">
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Product Name</h4>
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
                                        <select class="form-control form-control-line" name="education_id" id="education">
                                           <option value="" disabled selected>-- select education --</option>
                                            @foreach ($education as $item)
                                                <option value="{{ $item->id }}" @if($subject && $subject->education_id == $item->id) selected @endif> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Level</h4>
                                        <select class="form-control form-control-line" name="level_id" id="level">

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
                                        <select class="form-control form-control-line" name="material_id" id="material">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">Semesters</h4>
                                        <select class="form-control form-control-line" name="semester_id" id="semester">

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
@section('scripts')
<script>
    $('#education').on('change',function(){
    let id =$(this).val();
    console.log(id);
    $('#material').empty();
    $('#material').append(`<option value="0" disabled selected>Processing....</option`)
        $.ajax({
            type:'GET',
            url:'/dropdownlist/material/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#material').empty();
                $('#material').append(
                    `<option value="0">--select material--</option>`
                );

                $.each( response, function( key, value ) {
                    $('#material').append(
                        `<option value="${key}">${value}</option>`
                    );
                    // alert( key + ": " + value );
                });
                // response.array.forEach(element => {
                //     console.log(element);
                //     $('#material').append(
                //         `<option value="${element['id']}">${element['name']}</option>`
                //     );

                // });

            }
        });

    });



    $('#material').on('change',function(){
    let id =$(this).val();
    console.log(id);
    $('#level').empty();
    $('#level').append(`<option value="0" disabled selected>Processing....</option`)
        $.ajax({
            type:'GET',
            url:'/dropdownlist/level/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#level').empty();
                $('#level').append(
                    `<option value="0">--select level--</option>`
                );

                $.each( response, function( key, value ) {
                    $('#level').append(
                        `<option value="${key}">${value}</option>`
                    );
                });
            }
        });

    });


    $('#level').on('change',function(){
    let id =$(this).val();
    console.log(id);
    $('#semester').empty();
    $('#semester').append(`<option value="0" disabled selected>Processing....</option`)
        $.ajax({
            type:'GET',
            url:'/dropdownlist/semester/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#semester').empty();
                $('#semester').append(
                    `<option value="0">--select semester--</option>`
                );

                $.each( response, function( key, value ) {
                    $('#semester').append(
                        `<option value="${key}">${value}</option>`
                    );
                });
            }
        });

    });


</script>
@endsection
