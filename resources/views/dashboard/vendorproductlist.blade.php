@extends('dashboard.master')
@section('content')
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"> Employee's Product List </h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">@include('message')</li>

                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>

            </ol>
        </div>
    </div>
</div>

<ul class="nav nav-pills mb-3 tabforheadingandquestion" id="pills-tab" role="tablist">
    <li class="nav-item list-of-items">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Educational Products</a>
    </li>
    <li class="nav-item list-of-items">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Other Products</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row list-of-items">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Educational Product List</h4>
                        <h6 class="card-subtitle">
                            @include('message')
                        </h6>
                        <div class="table-responsive m-t-40">
                            {{--  <table id="myTable" class="table table-bordered table-striped">  --}}
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Approval</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Overview Content</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $index=>$item)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>
                                                <img src="{{ $item->image }}" alt="" width="100px" height="100px">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td class="text-success">
                                                <a href="" data-toggle="tooltip"
                                                data-original-title="Change Approval Status"
                                                onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('approval-form-{{ $item->slug }}').submit();">
                                                    @if ($item->approve == 1 )
                                                        <span class="badge badge-success m-r-5 m-b-5">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger m-r-5 m-b-5">Not Approved</span>
                                                    @endif
                                                </a>
                                                <form id="approval-form-{{ $item->slug }}" action="{{route('product.approval',$item->slug)}}" method="post">
                                                @csrf
                                                @method('post')
                                                </form>
                                            </td>
                                            <td>
                                                @if ($item->status == 1 )
                                                    <span class="badge badge-success m-r-5 m-b-5">Compelete</span>
                                                @else
                                                    <span class="badge badge-danger m-r-5 m-b-5">In Progress</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action" style="display: flex">
                                                    <a href="{{ route('read.content',$item->slug) }}" target="_blank" class="btn btn-rounded btn-xs btn-info m-r-5" target="blank" data-toggle="tooltip" data-original-title="Read Content">
                                                        <span>Read</span>
                                                    </a>

                                                    <a href="" data-toggle="modal" data-target="#{{ $item->id }}modal" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <div class="modal fade" id="{{ $item->id }}modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content rose">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="m-t-40" method="post" action="{{ route('product.update',$item->id ) }}" enctype="multipart/form-data">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    @csrf
                                                                    <input type="hidden" name="semester_id" value="{{ $item->semester_id }}">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="from-group">
                                                                                <h4 class="card-title">Image Upload</h4>
                                                                                <label for="input-file-now">Please select you image.</label>
                                                                                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $item->image ?? '' }}"/>
                                                                            </div>


                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Product Name</h4>
                                                                            <input type="text" name = "name" class="form-control form-control-line" value="{{ $item->name }}" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Author</h4>
                                                                            <input type="text" name = "author" class="form-control form-control-line" value="{{ $item->author }}" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Price</h4>
                                                                            <input type="text" name = "price" class="form-control form-control-line" value="{{ $item->price }}" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h4 class="card-title">Description</h4>
                                                                            <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                                                                {!! $item->description ?? '' !!}
                                                                            </textarea>
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
        </div>


    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row list-of-items">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Other Product List</h4>
                        <h6 class="card-subtitle">
                            @include('message')
                        </h6>
                        <div class="table-responsive m-t-40">
                                {{--  <table id="myOtherTable" class="table table-bordered table-striped">  --}}
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Approval</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Overview Content</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($other_products as $index=>$item)
                                            <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                    <img src="{{ $item->image }}" alt="" width="100px" height="100px">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                @if ($item->approve == 1 )

                                                <td class="text-success">
                                                        <a href="" class="badge badge-success m-r-5 m-b-5" data-toggle="tooltip"
                                                        data-original-title="Change Approval Status"
                                                        onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('approval-form-{{ $item->slug }}').submit();">
                                                        <span>Approved</span>
                                                        </a>
                                                        <form id="approval-form-{{ $item->slug }}" action="{{route('product.approval',$item->slug)}}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        </form>
                                                    </td>
                                                    @else
                                                    <td class="text-danger">
                                                        <a href="" class="badge badge-danger m-r-5 m-b-5" data-toggle="tooltip"
                                                        data-original-title="Approval Status"
                                                        onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('approval-form-{{ $item->slug }}').submit();">
                                                        <span>Not Approved</span>
                                                        </a>
                                                        <form id="approval-form-{{ $item->slug }}" action="{{route('product.approval',$item->slug)}}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        </form>
                                                    </td>
                                                    @endif

                                                    <td>
                                                        @if ($item->status == 1 )
                                                            <span class="badge badge-success m-r-5 m-b-5">Compelete</span>
                                                        @else
                                                            <span class="badge badge-danger m-r-5 m-b-5">In Progress</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="action" style="display: flex">
                                                            <a href="{{ route('read.otherproduct',$item->slug) }}" target="_blank" class="btn btn-rounded btn-xs btn-info m-r-5" target="blank" data-toggle="tooltip" data-original-title="Read Content">
                                                                <span>Read</span>
                                                            </a>
                                                            <a href="" data-toggle="modal" data-target="#{{ $item->id }}modal" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <div class="modal fade" id="{{ $item->id }}modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                  <div class="modal-content rose">
                                                                     <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                        <form class="m-t-40" method="post" action="{{ route('other.product.update',$item->id ) }}" enctype="multipart/form-data">
                                                                           <input type="hidden" name="_method" value="PUT">
                                                                           @csrf
                                                                           <input type="hidden" name="other_id" value="{{ $item->other_id }}">
                                                                           <div class="card">
                                                                              <div class="card-body">
                                                                                   <div class="from-group">
                                                                                       <h4 class="card-title">Image Upload</h4>
                                                                                       <label for="input-file-now">Please select you image.</label>
                                                                                       <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $item->image ?? '' }}"/>
                                                                                   </div>


                                                                                 <div class="form-group">
                                                                                    <h4 class="card-title">Product Name</h4>
                                                                                    <input type="text" name = "name" class="form-control form-control-line" value="{{ $item->name }}" required>
                                                                                 </div>

                                                                                 <div class="form-group">
                                                                                   <h4 class="card-title">Author</h4>
                                                                                   <input type="text" name = "author" class="form-control form-control-line" value="{{ $item->author }}" required>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                   <h4 class="card-title">Price</h4>
                                                                                   <input type="text" name = "price" class="form-control form-control-line" value="{{ $item->price }}" required>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                   <h4 class="card-title">Description</h4>
                                                                                   <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                                                                       {!! $item->description ?? '' !!}
                                                                                   </textarea>
                                                                               </div>


                                                                              </div>
                                                                           </div>
                                                                           <button type="submit" class="btn btn-primary">Update</button>
                                                                        </form>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>

                                                           <a href="" class="btn btn-rounded btn-sm btn-info m-r-5" data-toggle="tooltip"
                                                           data-original-title="Add Content"
                                                           onclick="event.preventDefault(); if(confirm('Are You Sure Want To Add Content ?')) document.getElementById('add-form-{{ $item->id }}').submit();">
                                                           <i class="fa fa-plus"></i>

                                                        </a>
                                                        <form id="add-form-{{ $item->id }}" action="{{route('other.product.search')}}" method="post">
                                                           @csrf
                                                           @method('post')
                                                           <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                           <input type="hidden" name="other_id" value="{{ $item->other->id ?? '' }}">
                                                        </form>



                                                            <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                                               data-original-title="Delete"
                                                               onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                            <i class="fa fa-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $item->id }}" action="{{route('other.product.destroy',$item->id)}}" method="post">
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
        </div>


    </div>
</div>


</div>

@endsection





