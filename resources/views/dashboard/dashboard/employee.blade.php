@role('Employee')
<div class="col-md-12 mb-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-primary text-center">You Can Add Content Of Products From Here Directly.</h4>
            <h6 class="card-subtitle text-center">Please <code>Fill Up Desire</code> Fields.</h6>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('employee.product.search') }}" method="POST">
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

{{--  ////////////////////////////////ssssssssssssssssssssssss//////////////////////////////////  --}}

<div class="col-md-12 align-self-center page-titles">
    <h4 class="text-themecolor">My Product</h4>
    </div>

    <div class="col-md-6 mb-3">
        <a href="{{ route('productBy.user') }}">
            <div class="card p-5">
                <div class="body">
                    <h4 class="card-title text-primary text-center">Educational Products</h4>
                    <h6 class="card-subtitle text-center">Collection of <code>Educational</code> Products.</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-3">
        <a href="{{ route('otherproductBy.user') }}">
            <div class="card p-5">
                <div class="body">
                    <h4 class="card-title text-primary text-center">Other Products</h4>
                    <h6 class="card-subtitle text-center">Collection of <code>Other</code> Products.</h6>
                </div>
            </div>
        </a>
    </div>


{{--  ////////////////////////////////ssssssssssssssssssssssss//////////////////////////////////  --}}


    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary text-center">You Can Add Content Of Others Products From Here Directly.</h4>
                <h6 class="card-subtitle text-center">Please <code>Fill Up Desire</code> Fields.</h6>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('employee.other.product.search') }}" method="POST">
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


@section('scripts')
<script>
    $('#education').on('change',function(){
    let id =$(this).val();
    console.log(id);
    $('#material').empty();
    $('#material').append(`<option value="0" disabled selected>Processing....</option`)
        $.ajax({
            type:'GET',
            url:'/employee/dropdownlist/material/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#material').empty();
                $('#material').append(
                    `<option value="" disabled selected>--select material--</option>`
                );
                $.each( response, function( key, value ) {
                    $('#material').append(
                        `<option value="${key}">${value}</option>`
                    );
                });

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
            url:'/employee/dropdownlist/level/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#level').empty();
                $('#level').append(
                    `<option value="" disabled selected>--select level--</option>`
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
            url:'/employee/dropdownlist/semester/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#semester').empty();
                $('#semester').append(
                    `<option value="" disabled selected>--select semester--</option>`
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
            url:'/employee/dropdownlist/product/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#product').empty();
                $('#product').append(
                    `<option value="" disabled selected>--select product--</option>`
                );
                $.each( response, function( key, value ) {
                    $('#product').append(
                        `<option value="${key}">${value}</option>`
                    );
                });
            }
        });

    });

    $('#other').on('change',function(){
    let id =$(this).val();
    console.log(id);
    $('#productId').empty();
    $('#productId').append(`<option value="0" disabled selected>Processing....</option`)
        $.ajax({
            type:'GET',
            url:'/employee/dropdownlist/otherproduct/'+id,
            success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#productId').empty();
                $('#productId').append(
                    `<option value="" disabled selected>--select product--</option>`
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
