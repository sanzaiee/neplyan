@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">
         @isset($role) Edit @else Add  @endisset Role
         <h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
         <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
               <li class="breadcrumb-item active">Role Management</li>
            </ol>
         </div>
      </div>
   </div>
   <div class="row list-of-items">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form role="form" action="{{ isset($role) ? route('role.update',$role->id) : route('role.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @isset($role) @method('put') @endisset
                  <div class="form-body">
                     <div class="row p-t-20">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputuname">Role Title</label>
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                 </div>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Role Title" aria-label="Role Title" aria-describedby="basic-addon1" value="{{ $role->name ?? old('name') }}">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row list-of-items">
                         
                    
                        <div class="col-md-4">
                        <span class="this-one">
                            <ul>
                                <li>
                                    <input type="checkbox" id="Role" />
                                    <label class="heading" for="Role">Role Model</label>
                                    <ul>
                                       @foreach($rolePermission as $key => $row)
                                       <li>
                                          <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                             foreach ($permissionSelected as $check) {
                                                 if ($row->id == $check->id) {
                                                     echo "checked";
                                                 }
                                             }
                                             } ?> />
                                          <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </span>
                        </div> 
                 
                        
                        <div class="col-md-4">
                           <span class="this-one">
                              <ul>
                                 <li>
                                    <input type="checkbox" id="User" />
                                    <label class="heading" for="User">User Model</label>
                                    <ul>
                                       @foreach($userPermission as $key => $row)
                                       <li>
                                          <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                             foreach ($permissionSelected as $check) {
                                                 if ($row->id == $check->id) {
                                                     echo "checked";
                                                 }
                                             }
                                             } ?> />
                                          <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </span>
                        </div>
                        <div class="col-md-4">
                           <span class="this-one">
                              <ul>
                                 <li>
                                    <input type="checkbox" id="Product" />
                                    <label class="heading" for="Product">Product Model</label>
                                    <ul>
                                       @foreach($productPermission as $key => $row)
                                       <li>
                                          <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                             foreach ($permissionSelected as $check) {
                                                 if ($row->id == $check->id) {
                                                     echo "checked";
                                                 }
                                             }
                                             } ?> />
                                          <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </span>
                        </div>
                        <div class="col-md-4">
                           <span class="this-one">
                              <ul>
                                 <li>
                                    <input type="checkbox" id="Topic" />
                                    <label class="heading" for="Topic">Topic Model</label>
                                    <ul>
                                       @foreach($topicPermission as $key => $row)
                                       <li>
                                          <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                             foreach ($permissionSelected as $check) {
                                                 if ($row->id == $check->id) {
                                                     echo "checked";
                                                 }
                                             }
                                             } ?> />
                                          <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </span>
                        </div>
                        <div class="col-md-4">
                           <span class="this-one">
                              <ul>
                                 <li>
                                    <input type="checkbox" id="topicContent" />
                                    <label class="heading" for="topicContent">Topic Content Model</label>
                                    <ul>
                                       @foreach($topicContentsPermission as $key => $row)
                                       <li>
                                          <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                             foreach ($permissionSelected as $check) {
                                                 if ($row->id == $check->id) {
                                                     echo "checked";
                                                 }
                                             }
                                             } ?> />
                                          <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </span>
                        </div>
                        <div class="col-md-4">
                           <span class="this-one">
                              <ul>
                                 <li>
                                    <input type="checkbox" id="employee" />
                                    <label class="heading" for="employee">Employee Access Model</label>
                                    <ul>
                                       @foreach($employeePermission as $key => $row)
                                       <li>
                                          <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                             foreach ($permissionSelected as $check) {
                                                 if ($row->id == $check->id) {
                                                     echo "checked";
                                                 }
                                             }
                                             } ?> />
                                          <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </span>
                        </div>
                        
                         <div class="col-md-4">
                            <span class="this-one">
                               <ul>
                                  <li>
                                     <input type="checkbox" id="Role" />
                                     <label class="heading" for="Role">Seller Model</label>
                                     <ul>
                                        @foreach($sellerPermission as $key => $row)
                                        <li>
                                           <input type="checkbox" name="permissions[]" value="{{ $row->id }}" id="{{ $row->name }}" <?php if (isset($permissionSelected)) {
                                              foreach ($permissionSelected as $check) {
                                                  if ($row->id == $check->id) {
                                                      echo "checked";
                                                  }
                                              }
                                              } ?> />
                                           <label class="item" for="{{ $row->name }}">{{ ucwords(str_replace('_',' ',$row->name)) }}</label>
                                        </li>
                                        @endforeach
                                     </ul>
                                  </li>
                               </ul>
                            </span>
                         </div>
                         
                         
                     </div>
                     <!-- row -->
                  </div>
                  <!-- row -->
                  {{-- Super Admin Should Always Have Roles Permission --}}
                  <!-- row -->
            </div>
            <div class="form-actions">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
            <a href="{{ route('role.index') }}" class="btn btn-inverse">Cancel</a>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
@section('roleJs')
<script src="{{ asset('') }}dashboard/js/role.js"></script>
@stop
