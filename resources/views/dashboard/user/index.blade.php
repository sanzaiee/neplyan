@extends('dashboard.master')
@section('content')

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 align-self-center">
                <h4 class="text-themecolor">Admins</h4>
            </div>

            <div class="col-md-6 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                    <a href="{{route('admin.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add Admin</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row list-of-items">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        {{--  <th>Profile</th>  --}}
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($admins as $admin)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{ucwords($admin->name)}}
                                        </td>
                                        <td>
                                            {{$admin->email}}
                                        </td>
                                        {{--  <td>
                                            <img src="{{asset('')}}uploads/admins/{{$admin->image}}" alt="{{$admin->name}}" height="50" width="50">
                                        </td>  --}}
                                        <td>
                                            @foreach($admin->roles as $role)
                                            <span class="badge badge-success m-r-5 m-b-5">{{ucwords($role->name)}}</span>&nbsp;
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($admin->status == 1)
                                            <span class="badge badge-success m-r-5 m-b-5">Active</span>
                                            @else
                                            <span class="badge badge-danger m-r-5 m-b-5">Banned</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{--  @can('update_user')  --}}
                                            <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            {{--  @endcan  --}}
                                            {{--  @can('delete_user')  --}}
                                            <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip" data-original-title="Delete" onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            {{--  @endcan  --}}
                                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.destroy',$admin->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{--  @include('admin.layouts.rightsidebar')  --}}

    </div>

@endsection
