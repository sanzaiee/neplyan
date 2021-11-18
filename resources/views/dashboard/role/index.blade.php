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
                <h4 class="text-themecolor">Roles</h4>
            </div>

            <div class="col-md-6 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                    <a href="{{route('role.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add Role</a>
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
                                        <th>Role Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{ucwords($role->name)}}
                                            </td>
                                            <td>
                                                {{ date('M d, Y | g:i a',strtotime($role->created_at)) }}
                                            </td>
                                            <td>
                                                {{ date('M d, Y | g:i a',strtotime($role->updated_at)) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                @if($role->id != 1)
                                                    <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip" data-original-title="Delete" onclick="event.preventDefault(); if(confirm('You are about to delete a Role. Are You Really Sure ?')) document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                    <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy',$role->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                    </form>
                                                @endif
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
    </div>
@endsection
