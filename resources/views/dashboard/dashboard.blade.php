@extends('dashboard.master')
@role('Seller')
    @section('content')
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Dashboard</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row page-user">
                <div class="col-md-4">
                    <a href="{{ route('total.sale') }}">
                        <div class="card p-5">
                            <div class="body">
                                <h4 class="card-title text-primary text-center">My Sales</h4>
                                <h6 class="card-subtitle text-center">You have made  <code>{{ $totalSales }}</code> sales.</h6>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('total.client') }}">
                        <div class="card p-5">
                            <div class="body">
                                <h4 class="card-title text-primary text-center">Customer List</h4>
                                <h6 class="card-subtitle text-center">You are linked with <code>{{ $totalUser }}</code> Customers.</h6>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('email.list') }}">
                        <div class="card p-5">
                            <div class="body">
                                <h4 class="card-title text-primary text-center">Messages</h4>
                                <h6 class="card-subtitle text-center">Mail from <code>Admin</code></h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="row banner-new-part mt-3 mb-3">
        <div class="col-md-6">
            <img src="../frontend/image/a1.gif" class="w-100">
        </div>
        <div class="col-md-6">
            <img src="../frontend/image/a1.gif" class="w-100">
        </div>
    </div>
        </div>
    @endsection
@else
    @section('content')
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
               
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                    @role('SuperAdmin')
                        <a href="{{ route('education.create') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i> Education</button></a>
                    @endrole
                </div>
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-user">
            @role('SuperAdmin')
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary text-center">You Can Add Content Of Products From Here Directly.</h4>
                            <h6 class="card-subtitle text-center">Please <code>Fill Up Desire</code> Fields.</h6>
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
                                            <select class="form-control form-control-line" name="material_id" id="material">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group mr-1">
                                            <p class="text-muted text-primary text-center">Level</p>
                                            <select class="form-control form-control-line" name="level_id" id="level">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group mr-1">
                                            <p class="text-muted text-primary text-center">Semester</p>
                                            <select class="form-control form-control-line" name="semester_id" id="semester">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group mr-1">
                                            <p class="text-muted text-primary text-center">Product</p>
                                            <select class="form-control form-control-line" name="product_id" id="product">
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
            @endrole
            @role('SuperAdmin')
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">

                                <a href="{{ route('education.create') }}">
                                    <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="display-5 text-primary"><i class="fa fa-university"></i></span>

                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">Education</h2>
                                        <h2 class="counter text-primary">{{ $education->count() }} items</h2>

                                    </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: 50%; height: 10px;" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">

                                <a href="{{ route('other.create') }}">
                                    <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="display-5 text-primary"><i class="fa fa-university"></i></span>

                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">Other Education</h2>
                                        <h2 class="counter text-primary">{{ $others->count() }} items</h2>

                                    </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: 50%; height: 10px;" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                 <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">Set Discount[%]</h2>
                                    </div>
                                    @php
                                        $dis = App\Discount::where('status',1)->first();
                                    @endphp
                               <form method="post" action={{route('discount.store')}}>
                                   @csrf
                                   
                                   @if($dis)
                                    <input type="hidden" name="update" value="1">
                                    @else
                                        <input type="hidden" name="update" value="0">

                                   @endif
                                    <div class="d-flex no-block align-items-center">
                                        <span class="text-primary">
                                             <input type="number" name="discount" class="form-control" value="@if($dis){{$dis->percent ?? ''}}@endif">
                                        </span>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                              </form>
                            </div>
                         
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary text-center">You Can Add Content Of Others Products From Here Directly.</h4>
                            <h6 class="card-subtitle text-center">Please <code>Fill Up Desire</code> Fields.</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('other.product.search') }}" method="POST">
                                    @csrf
                                    <div class="row align-items-center">
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Category For Other Product</p>
                                                <select class="form-control form-control-line" name="other_id" id="other" required>
                                                <option value="" disabled selected>-- select category --</option>
                                                @foreach ($others as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group mr-1">
                                                <p class="text-muted text-primary text-center">Other Products</p>
                                                <select class="form-control form-control-line" name="product_id" id="productId">
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
            @endrole

            @role('Employee')
                @include('dashboard.dashboard.employee')
            @endrole
            
           


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
                        `<option>--select material--</option>`
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
                        `<option>--select level--</option>`
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
                        `<option>--select semester--</option>`
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
                        `<option>--select product--</option>`
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



        $('#other').on('change',function(){
        let id =$(this).val();
        console.log(id);
        $('#productId').empty();
        $('#productId').append(`<option value="0" disabled selected>Processing....</option`)
            $.ajax({
                type:'GET',
                url:'/dropdownlist/otherproduct/'+id,
                success:function(response){
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#productId').empty();
                    $('#productId').append(
                        `<option value="0">--select product--</option>`
                    );

                    $.each( response, function( key, value ) {
                        $('#productId').append(
                            `<option value="${key}">${value}</option>`
                        );
                    });
                }
            });

        });

        </script>
    @endsection
@endrole
