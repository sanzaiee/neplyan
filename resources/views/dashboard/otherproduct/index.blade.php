@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">Other Product</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
         <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>

                <li class="breadcrumb-item active">
                    <a href="{{ route('other.product.create') }} ">Add Other Products</a>
                </li>
            </ol>
         </div>
      </div>
   </div>
   <div class="row list-of-items">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Other Product List</h4>
               <h6 class="card-subtitle">List of <code>Product</code>.</h6>
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">S/N</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
                           <th scope="col">User Name</th>
                           <th scope="col">Category</th>
                           <th scope="col">Approval</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($products as $index=>$item)
                        <tr>
                           <td>{{ ++$index }}</td>
                           <td><img src="{{ $item->image }}" alt="" height="100px" width="100px"></td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->user->name }}</td>
                           <td>{{ $item->other->name }}</td>
                           @if ($item->approve == 1 )
                           <td class="text-success">Approved</td>
                           @else
                           <td class="text-danger">Not Approved</td>
                           @endif

                           <td>
                            @if($item->status == 1)
                                <span class="badge badge-success m-r-5 m-b-5">Active</span>
                            @else
                                <span class="badge badge-danger m-r-5 m-b-5">Banned</span>
                            @endif
                        </td>
                           <td>
                              <div class="action" style="display: flex">
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

                                <a href="" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip"
                                data-original-title="Add Content"
                                onclick="event.preventDefault(); if(confirm('Are You Sure Want To Add Content ?')) document.getElementById('add-form-{{ $item->id }}').submit();">
                                <i class="fa fa-plus"></i>

                             </a>
                             <form id="add-form-{{ $item->id }}" action="{{route('other.product.search')}}" method="post">
                                @csrf
                                @method('post')
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="other_id" value="{{ $item->other->id }}">
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
@endsection
