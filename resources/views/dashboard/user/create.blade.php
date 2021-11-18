@extends('dashboard.master')

@section('header')
{{--  <link rel="stylesheet" href="{{ asset('') }}dashboard/node_modules/dropify/dist/css/dropify.min.css">  --}}
<link href="{{ asset('') }}select2/4.0.11/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')


    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="row page-titles">
            <div class="col-md-6 align-self-center">
                <h4 class="text-themecolor">  @isset($admin) Edit @else Add @endisset Admin</h4>
            </div>

            <div class="col-md-6 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    </ol>
                    <a href="{{route('admin.index')}}" class="btn btn-info d-none d-lg-block m-l-15">Admins <i class="fa fa-arrow-up"></i></a>
                </div>
            </div>
        </div>


        <div class="row list-of-items">
            <div class="col-lg-12">
                <div class="card">
                    {{--  <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">
                            @isset($admin) Edit @else Add @endisset Admin
                        </h4>
                    </div>  --}}
                    <div class="card-body">
                        @include('message')
                        <form role="form" action="{{ isset($admin) ? route('admin.update',$admin->id) : route('admin.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($admin) @method('put') @endisset
                            <div class="form-body">

                                <div class="row p-t-20">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputuname">Admin Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                                </div>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" aria-label="Name" aria-describedby="basic-addon1" value="{{ $admin->name ?? old('name') }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputuname">Mobile Number</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-mobile"></i></span>
                                                </div>
                                                <input type="text" name="mobile" class="form-control" placeholder="Enter Number" aria-label="mobile" aria-describedby="basic-addon1" value="{{ $admin->mobile ?? old('mobile') }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputuname">Address</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-location-arrow"></i></span>
                                                </div>
                                                <input type="text" name="address" class="form-control" placeholder="Enter Address" aria-label="address" aria-describedby="basic-addon1" value="{{ $admin->address ?? old('address') }}">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputuname">Email Address</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                                </div>
                                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address" aria-label="Email Address" aria-describedby="basic-addon1" value="{{ $admin->email ?? old('email') }}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputuname">Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-id-badge"></i></span>
                                                </div>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password" aria-label="Password" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputuname">Confirm your password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-id-badge"></i></span>
                                                </div>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your password" aria-label="Password" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        {{--  <div class="form-group">
                                            <label for="exampleInputuname">Profile Picture</label>
                                            <div class="input-group mb-3">
                                                @if (!empty($admin->image))
                                                <hr>
                                                <input type="file" name="image" id="image" class="dropify" data-default-file="{{ asset('uploads/admins/'.$admin->image) }}" />
                                                @else
                                                <input type="file" name="image" id="image" class="dropify" />
                                                @endif
                                            </div>
                                        </div>  --}}

                                        <div class="form-group">
                                            <label for="exampleInputuname">Role</label>
                                            <div class="input-group mb-3">
                                                <select class="js-example-basic-multiple form-control m-input select2_demo_1" name="roles[]" multiple="multiple">
                                                    @foreach($roles as $row)
                                                    <option <?php if (isset($roleSelected)) {
                                                                foreach ($roleSelected as $check) {
                                                                    if ($row->name == $check) {
                                                                        echo 'selected="SELECTED"';
                                                                    }
                                                                }
                                                            } ?>value="{{ $row->id }}">{{ ucwords($row->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Active Status</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="1" <?php echo (isset($admin->status) && ($admin->status == 1)) ? 'checked="checked"' : ''; ?>>
                                                <label class="custom-control-label" for="customRadio1">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0" <?php echo (isset($admin->status) ? ((isset($admin->status) && ($admin->status == 0)) ? 'checked="checked"' : '') : 'checked="checked"'); ?>>
                                                <label class="custom-control-label" for="customRadio2">No</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin.index') }}" class="btn btn-inverse">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  @include('admin.layouts.rightsidebar')  --}}

    </div>

@endsection
@section('roleJs')
<script src="{{ asset('') }}select2/4.0.11/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option'
        });
    });
</script>
@endsection

