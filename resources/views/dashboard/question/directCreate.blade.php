@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Questions</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Question </li>
                </ol>
                {{-- <a href="{{ route('product.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-arrow-up"></i> All Content</button></a> --}}
            </div>
        </div>
    </div>
    <div class="list-of-items">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Question</h4>
            <h6 class="card-subtitle">
               Choose the <code>respective levels</code> to add product.
            </h6>

            <h6 class="card-subtitle">
                @include('message')
            </h6>

            {{--  @if ($subject)
                <form class="m-t-40" method="post" action="{{ route('question.update',$subject->id ) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
            @else  --}}
                <form method="post" action="{{ route('question.store') }}" enctype="multipart/form-data">
            {{--  @endif  --}}
                @csrf
            <div class="row list-of-items">
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Question Name</h4>
                                <input type="text" name = "name" class="form-control form-control-line"  value="{{ $subject->name ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Question Content(Optional)</h4>
                            <label for="input-file-now">Please select your question content.</label>
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
                                <div class="form-group mr-1">
                                    <h4 class="card-title">Products</h4>
                                    <select class="form-control form-control-line" name="product_id" id="product">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>


            <div class="row list-of-items">
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

            <div class="row list-of-items">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Question Content</h4>
                            <textarea name="question" id="description-ckeditor" class="ckeditor" required>
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

    $('#semester').on('change',function(){
    let id =$(this).val();
    console.log(id);
    $('#product').empty();
    $('#product').append(`<option value="0" disabled selected>Processing....</option`)
        $.ajax({
            type:'GET',
            url:'/dropdownlist/product/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#product').empty();
                $('#product').append(
                    `<option value="0">--select product--</option>`
                );

                $.each( response, function( key, value ) {
                    $('#product').append(
                        `<option value="${key}">${value}</option>`
                    );
                });
            }
        });

    });


</script>
@endsection
