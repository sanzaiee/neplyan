@extends('dashboard.master')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
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

                @if(auth()->user()->role('Employee'))
                <a href="{{ route('education.create') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i>Education</button></a>
                @endif

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-user">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-primary text-center">Jump anywhere....</h4>
                        <h6 class="card-subtitle text-center">Please <code>Fill Up Desire</code> Fields. @include('message')</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('product.search') }}" method="POST">
                                    @csrf
                                    <div class="row align-items-center">
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Education</p>
                                                <select class="form-control form-control-line" name="education_id" id="education" required>
                                                    <option value="" disabled selected>-- select education --</option>
                                                    @foreach ($education as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Material</p>
                                                <select class="form-control form-control-line" name="material_id" id="material" required>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Level</p>
                                                <select class="form-control form-control-line" name="level_id" id="level" required>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Semester</p>
                                                <select class="form-control form-control-line" name="semester_id" id="semester" required>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Product</p>
                                                <select class="form-control form-control-line" name="product_id" id="product" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-12 mb-1 text-center">
                                    <button type="submit" class="btn btn-primary w-25">Search</button>
                            </div>
        </form>

                        </div>
                    </div>
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

    // $('#product').on('change',function(){
    // let id =$(this).val();
    // console.log(id);
    // $('#topic').empty();
    // $('#topic').append(`<option value="0" disabled selected>Processing....</option`)
    //     $.ajax({
    //         type:'GET',
    //         url:'/dropdownlist/topic/'+id,
    //         success:function(response){
    //             var response = JSON.parse(response);
    //             console.log(response);
    //             $('#topic').empty();
    //             $('#topic').append(
    //                 `<option value="0">--select topic--</option>`
    //             );

    //             $.each( response, function( key, value ) {
    //                 $('#topic').append(
    //                     `<option value="${key}">${value}</option>`
    //                 );
    //             });
    //         }
    //     });

    // });


    // $('#topic').on('change',function(){
    // let id =$(this).val();
    // console.log(id);
    // $('#topiccontent').empty();
    // $('#topiccontent').append(`<option value="0" disabled selected>Processing....</option`)
    //     $.ajax({
    //         type:'GET',
    //         url:'/dropdownlist/topiccontent/'+id,
    //         success:function(response){
    //             var response = JSON.parse(response);
    //             console.log(response);
    //             $('#topiccontent').empty();
    //             $('#topiccontent').append(
    //                 `<option value="0">--select topiccontent--</option>`
    //             );

    //             $.each( response, function( key, value ) {
    //                 $('#topiccontent').append(
    //                     `<option value="${key}">${value}</option>`
    //                 );
    //             });
    //         }
    //     });

    // });

</script>
@endsection
