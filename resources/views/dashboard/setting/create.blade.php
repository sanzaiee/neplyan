@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Website Setting</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Update Your Setting </li>
                </ol>
            </div>
        </div>
    </div>
<div class="list-of-items">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Your Setting</h4>
              
                @if ($setting)
                    <form class="m-t-40" method="post" action="{{ route('setting.update',$setting->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form method="post" action="{{ route('setting.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf

                <div class="row list-of-items">
                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Website Name</h4>
                                    <input type="text" name = "name" class="form-control form-control-line"  value="{{ $setting->name ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Email Address</h4>
                                    <input type="text" name = "email" class="form-control form-control-line"  value="{{ $setting->email ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Website Logo</h4>
                                <label for="input-file-now">Please select your image.</label>
                                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $setting->image ?? '' }}"/>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-lg-8 col-md-8 row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Website Fav-Icon</h4>
                                    <label for="input-file-now">Please select your fav-icon.</label>
                                    <input type="file" name="fav" id="input-file-now" class="dropify" data-default-file="{{ asset($setting->fav ?? "dummy.jpg") }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4 class="card-title">MapLink</h4>
                                        <input type="text" name = "maplink" class="form-control form-control-line"  value="{{ $setting->maplink ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Footer Content</h4>
                                    <textarea name="footer" id="description-ckeditor" class="ckeditor" required>
                                        {!! $setting->footer ?? '' !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-lg-8 col-md-8">-->
                    <!--    <div class="card">-->
                    <!--        <div class="card-body">-->
                    <!--            <h4 class="card-title">Footer Content</h4>-->
                    <!--            <textarea name="footer" id="description-ckeditor" class="ckeditor" required>-->
                    <!--                {!! $setting->footer ?? '' !!}-->
                    <!--            </textarea>-->
                    <!--        </div>-->
                    <!--    </div>-->

                    <!--    <div class="card">-->
                    <!--        <div class="card-body">-->
                    <!--            <div class="form-group">-->
                    <!--                <h4 class="card-title">MapLink</h4>-->
                    <!--                <input type="text" name = "maplink" class="form-control form-control-line"  value="{{ $setting->maplink ?? '' }}" required>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Phone Number</h4>
                                    <input type="text" name = "phone" class="form-control form-control-line"  value="{{ $setting->phone ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Mobile Number</h4>
                                    <input type="text" name = "mobile" class="form-control form-control-line"  value="{{ $setting->mobile ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Location</h4>
                                    <input type="text" name = "location" class="form-control form-control-line"  value="{{ $setting->location ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="row list-of-items">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Facebook Link</h4>
                                    <input type="text" name = "facebook" class="form-control form-control-line"  value="{{ $setting->facebook ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Twitter Link</h4>
                                    <input type="text" name = "twitter" class="form-control form-control-line"  value="{{ $setting->twitter ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Instagram Link</h4>
                                    <input type="text" name = "instagram" class="form-control form-control-line"  value="{{ $setting->title ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Youtube Link</h4>
                                    <input type="text" name = "youtube" class="form-control form-control-line"  value="{{ $setting->youtube ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Tiktok Link</h4>
                                    <input type="text" name = "tiktok" class="form-control form-control-line"  value="{{ $setting->tiktok ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Opening Time</h4>
                                    <input type="text" name = "opening" class="form-control form-control-line"  value="{{ $setting->opening ?? '' }}" required>
                                </div>
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
