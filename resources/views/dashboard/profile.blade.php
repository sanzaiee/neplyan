@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <!-- ============================================================== -->
   <!-- Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">My Profile</h4>
         <h6 class="card-subtitle">
         </h6>
      </div>
   </div>

   <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
         <div class="card">
            <img class="card-img" src="{{  $profile->image ?? asset('dummy.jpg') }}" height="250" alt="Card image">
            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
               <div class="align-self-center">
                  <img src="{{ $profile->image ?? asset('dummy.jpg') }}" class="img-circle" width="100">
                  <h4 class="card-title">{{ $client->name }}</h4>
                  <h6 class="card-subtitle">{{ $client->name }}</h6>
               </div>
            </div>
         </div>
         <div class="profile-user card">
            <div class="card-body">
               <small class="text-muted">Email address </small>
               <h6>{{ $client->email }}</h6>
               <small class="text-muted p-t-30 db">Phone</small>
               <h6>{{ $client->mobile }}</h6>
               <small class="text-muted p-t-30 db">Address</small>
               <h6>{{ $client->address }}</h6>
               <small class="text-muted p-t-30 db">Social Profile</small>
               <br/>
                    <a href="{{ $profile->facebook ?? '' }}" target="_blank" ><button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button></a>
                    <a href="{{ $profile->twitter ?? '' }}" target="_blank"><button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button></a>
                    <a href="{{ $profile->youtube ?? '' }}" target="_blank"><button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button></a>
                    <a href="{{ $profile->instagram ?? '' }}" target="_blank"><button class="btn btn-circle btn-secondary"><i class="fa fa-instagram"></i></button></a>
            </div>
         </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-7">
         <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tab-profile" role="tablist">
               <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
               <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content profile-tab">
               <div class="tab-pane active" id="profile" role="tabpanel">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-3 col-xs-6 b-r">
                           <strong>Full Name</strong>
                           <br>
                           <p class="text-muted">{{ $profile->fullname ?? '' }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r">
                           <strong>Mobile</strong>
                           <br>
                           <p class="text-muted">{{ $client->mobile ?? '' }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r">
                           <strong>Email</strong>
                           <br>
                           <p class="text-muted">{{ $client->email }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                           <strong>Location</strong>
                           <br>
                           <p class="text-muted">{{ $profile->address ?? '' }}</p>
                        </div>
                     </div>
                     <hr>
                     {!! $profile->about ?? '' !!}
                  </div>
               </div>
               <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="card-body">
                      @if ($profile)
                     <form class="form-horizontal form-material" action="{{ route('admin.profile.update',$profile->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                      @else
                     <form class="form-horizontal form-material" action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">

                      @endif
                        @csrf
                        <div class="form-group">
                           <label class="col-md-12">Full Name</label>
                           <div class="col-md-12">
                              <input type="text" name="fullname" value="{{ $profile->fullname ?? ''}}" class="form-control form-control-line">
                           </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Full Address</label>
                            <div class="col-md-12">
                               <input type="text" name="address" value="{{ $profile->address ?? ''}}" class="form-control form-control-line">
                            </div>
                         </div>


                         <div class="form-group">
                            <label class="col-md-12">Facebook Link</label>
                            <div class="col-md-12">
                               <input type="text" name="facebook" value="{{ $profile->facebook ?? ''}}" class="form-control form-control-line">
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-12">Instagram Link</label>
                            <div class="col-md-12">
                               <input type="text" name="instagram" value="{{ $profile->instagram ?? ''}}" class="form-control form-control-line">
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-12">Twitter Link</label>
                            <div class="col-md-12">
                               <input type="text" name="twitter" value="{{ $profile->twitter ?? ''}}" class="form-control form-control-line">
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-12">Youtube Link</label>
                            <div class="col-md-12">
                               <input type="text" name="youtube" value="{{ $profile->youtube ?? ''}}" class="form-control form-control-line">
                            </div>
                         </div>


                        <div class="form-group">
                           <label class="col-md-12">About</label>
                           <div class="col-md-12">
                              <textarea rows="5" name="about" class="form-control form-control-line">{{ $profile->about ?? ''}} </textarea>
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="input-file-now">Please select your image.</label>
                            <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $profile->image ?? '' }}"/>
                        </div>

                        <div class="form-group">
                           <div class="col-sm-12">
                              <button class="btn btn-success">Update Profile</button>
                           </div>
                        </div>

                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Column -->
   </div>
</div>
@endsection

