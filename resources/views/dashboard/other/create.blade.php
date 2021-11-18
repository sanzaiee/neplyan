@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Other Education<h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active">Add Content </li>
                </ol>
                {{-- <a href="{{ route('education.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-arrow-up"></i>All Content</button></a> --}}
            </div>
        </div>
    </div>


    <div class="row list-of-items">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create content</h4>
                    <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>

                    {{-- @if ($education)
                        <form class="m-t-40" method="post" action="{{ route('education.update',$education->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                    @else --}}
                        <form method="post" action="{{ route('other.store') }}" enctype="multipart/form-data">
                    {{-- @endif

                    @csrf --}}
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Education Name</h4>
                                <input type="text" name = "name" class="form-control form-control-line"  value="{{ $other->name ?? '' }}" required>
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
                    <h4 class="card-title">Education List</h4>
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
                                       @forelse ($others as $index=>$item)
                                           <tr>
                                            <td>{{ ++$index }}</td>

                                               <td>{{ $item->name }}</td>

                                               <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-success m-r-5 m-b-5">Active</span>
                                                @else
                                                    <span class="badge badge-danger m-r-5 m-b-5">Banned</span>
                                                @endif
                                            </td>
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
                                                                     <h5 class="modal-title" id="exampleModalLongTitle">Update Education</h5>
                                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                     </button>
                                                                  </div>
                                                                  <div class="modal-body">

                                                                    <form class="m-t-40" method="post" action="{{ route('other.update',$item->id ) }}" enctype="multipart/form-data">
                                                                        <input type="hidden" name="_method" value="PUT">
                                                                        @csrf

                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Feature Status</h4>
                                                                                <select name="status" id="" class="form-control form-control-line">
                                                                                    @if ($item->status == 1)
                                                                                        <option value="1" selected> Active</option>
                                                                                        <option value="0">In Active</option>
                                                                                    @elseif ($item->status == 0)
                                                                                        <option value="1"> Active</option>
                                                                                        <option value="0" selected>In Active</option>
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <h4 class="card-title">Education Name</h4>
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
                                                        <form id="delete-form-{{ $item->id }}" action="{{route('other.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        </form>

                                                        <a href="{{ route('other.product.create') }}" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip" data-original-title="Add Content">
                                                            <i class="fa fa-plus">Add Content</i>
                                                        </a>
                                                </div>
                                                    {{-- <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i>Add Content</button> --}}
                                                </td>
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



