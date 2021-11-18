@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">My Educational Products </h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
         <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
            </ol>
            <a href="{{ route('directProd.create') }}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
               class="fa fa-plus-circle"></i> Add Product</button>
            </a>

         </div>
      </div>
   </div>
   <div class="row list-of-items">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Product List</h4>
               <h6 class="card-subtitle">List of <code>Your Product</code>.</h6>
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">S/N</th>
                           {{--  <th scope="col">Image</th>  --}}
                           <th scope="col">Name</th>
                           <th scope="col">Education</th>
                           <th scope="col">Material</th>
                           <th scope="col">Level</th>
                           <th scope="col">Semester</th>
                           <th scope="col">Approval</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($products as $index=>$item)
                        <tr>
                           <td>{{ ++$index }}

                            </td>
                           {{--  <td><img src="{{ $item->image }}" alt="" height="100px" width="100px"></td>  --}}
                           <td>
                                {{ ucfirst($item->name) }}
                           </td>
                           <td>{{ $item->semester->level->material->education->name }}</td>
                           <td>{{ $item->semester->level->material->name }}</td>
                           <td>{{ $item->semester->level->name }}</td>
                           <td>{{ $item->semester->name }}</td>
                           @if ($item->approve == 1 )
                           <td class="text-success">
                            <span class="badge badge-success m-r-5 m-b-5">Approved</span>

                           </td>
                           @else
                           <td class="text-danger">
                            <span class="badge badge-danger m-r-5 m-b-5">Not Approved</span>

                           </td>
                           @endif

                           @if ($item->status == 1 )
                           <td class="text-success">
                            <span class="badge badge-success m-r-5 m-b-5">Complete</span>
                           </td>
                           @else
                           <td class="text-danger">
                            <span class="badge badge-danger m-r-5 m-b-5">In progress</span>
                           </td>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="m-t-40" method="post" action="{{ route('productBy.user.update',$item->id ) }}" enctype="multipart/form-data">
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
                                                            <h4 class="card-title">Status</h4>
                                                            <select name="status" id="" class="form-control form-control-line">
                                                                @if ($item->status == 1)
                                                                    <option value="1" selected>Compelete</option>
                                                                    <option value="0">In Progress</option>
                                                                @else
                                                                <option value="1">Compelete</option>
                                                                <option value="0" selected>In Progress</option>
                                                                @endif
                                                            </select>
                                                            </div>
                                                            
                                                            
                                                             <div class="form-group">
                                                            <h4 class="card-title">Free Book</h4>
                                                            <select name="free" id="" class="form-control form-control-line">
                                                                @if ($item->free == 1)
                                                                    <option value="1" selected>Yes</option>
                                                                    <option value="0">No</option>
                                                                @else
                                                                <option value="1">Yes</option>
                                                                <option value="0" selected>No</option>
                                                                @endif
                                                            </select>
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

                                        <a href="{{ route('add.topic',$item->slug) }}" class="btn btn-rounded btn-xs btn-info m-r-5" target="blank" data-toggle="tooltip" data-original-title="Add Content">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        
                                        <a href="{{ route('read.content',$item->slug) }}" class="btn btn-rounded btn-xs btn-info m-r-5" target="_blank" data-toggle="tooltip" data-original-title="Add Content">
                                            Read
                                        </a>
                                        
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
                            <h4 class="card-title">No Product Yet.... <code>Please Add Product!!!!</code></h4>
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
