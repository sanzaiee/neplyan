@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Semesters<h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Add Content </li>
                </ol>

            </div>
        </div>
    </div>


    <div class="row list-of-items">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create content</h4>
                    <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields. @include('message')</h6>

                    {{-- @if ($education)
                        <form class="m-t-40" method="post" action="{{ route('education.update',$education->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                    @else --}}
                        <form method="post" action="{{ route('semester.store') }}" enctype="multipart/form-data">
                    {{-- @endif

                    @csrf --}}
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Semester Name</h4>
                                <input type="text" name = "name" class="form-control form-control-line" required>
                            </div>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>




    <div class="row list-of-items">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Semester List</h4>
                    <h6 class="card-subtitle">List of <code>Education</code>.</h6>
                    <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th scope="col">S/N</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($semesters as $index=>$item)
                                           <tr>
                                            <td>{{ ++$index }}</td>

                                               <td>{{ $item->name }}</td>

                                               @if ($item->status ==1 )
                                                   <td class="text-success">Active</td>
                                               @else
                                                   <td class="text-danger">InActive</td>
                                                   @endif
                                               <td>

                                                  <div class="action" style="display: flex">

                                                    {{-- for edit --}}
                                                        <a href="" data-toggle="modal" data-target="#{{ $item->id }}modal" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>

                                                        <div class="modal fade" id="{{ $item->id }}modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                               <div class="modal-content rose">
                                                                  <div class="modal-header">
                                                                     <h5 class="modal-title" id="exampleModalLongTitle">Update Semster</h5>
                                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                     </button>
                                                                  </div>
                                                                  <div class="modal-body">

                                                                    <form class="m-t-40" method="post" action="{{ route('semester.update',$item->id ) }}" enctype="multipart/form-data">
                                                                        <input type="hidden" name="_method" value="PUT">
                                                                        @csrf
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <h4 class="card-title">Semester Name</h4>
                                                                                    <input type="text" name = "name" class="form-control form-control-line" value="{{ $item->name }}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </form>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
{{-- for editing contents ends here modal --}}


                                                        <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                                        data-original-title="Delete"
                                                        onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $item->id }}" action="{{route('semester.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        </form>

                                                        <a href="{{ route('add.semester',$item->slug) }}" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip" data-original-title="Add Content">
                                                            <i class="fa fa-plus">Add Content</i>
                                                        </a>
                                                </div>
                                                    {{-- <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i>Add Content</button> --}}
                                                </td>

{{-- modal for edit --}}

                                           </tr>
                                       @empty
                                           <h1>Content not updated yet...</h1>
                                       @endforelse

                                    </tbody>
                                 </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection






