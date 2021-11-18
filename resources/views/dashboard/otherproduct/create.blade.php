@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Other Product<h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>

                    <li class="breadcrumb-item active">
                        <a href="{{ route('other.product.index') }} ">All Other Products</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row list-of-items">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create content</h4>
                    <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>
                    <form method="post" action="{{ route('other.product.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row lsit-of-items">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Image</h4>
                                        <label for="input-file-now">Please select your image.</label>
                                        <input type="file" name="image" id="input-file-now" class="dropify" data-default-file=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Product Name</h4>
                                            <input type="text" name = "name" class="form-control form-control-line" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Price </h4>
                                            <input type="text" name ="price" class="form-control form-control-line" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Author Name </h4>
                                            <input type="text" name ="author" class="form-control form-control-line"  required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <h4 class="card-title">Category List </h4>
                                            <select name="other_id" id="" class="form-control form-control-line">
                                                <option value="" class="form-control form-control-line">--please select category--</option>
                                                @foreach ($others as $item)
                                                    <option class="form-control form-control-line" value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Description</h4>
                                        <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                        </textarea>
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

    {{-- <div class="row list-of-items">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">subject List</h4>
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
                                       @forelse ($products as $index=>$item)
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

                                                                <form class="m-t-40" method="post" action="{{ route('subject.update',$item->id ) }}" enctype="multipart/form-data">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    @csrf
                                                                    <input type="hidden" name="semester_id" value="{{ $semester }}">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <h4 class="card-title">subject Name</h4>
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


                                                        <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                                        data-original-title="Delete"
                                                        onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $item->id }}" action="{{route('product.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        </form>


                                                </div>
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
    </div> --}}

</div>
@endsection






