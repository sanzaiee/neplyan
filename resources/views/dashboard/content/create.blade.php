@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">
            Content of {{ $topic->heading }}
         <h4>
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
               <h4 class="card-title">Create Content</h4>
               <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>
               <form method="post" action="{{ route('topiccontent.store') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="topic_id" id="" value="{{ $topic->id }}">
                  <div class="card">
                     <div class="card-body">
                        <div class="form-group">
                           <h4 class="card-title">Title</h4>
                           <input type="text" name = "title" class="form-control form-control-line" required>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title">Content</h4>
                        <textarea name="content" id="description-ckeditor" class="ckeditor" required>

                        </textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row list-of-items">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Content List</h4>
               <h6 class="card-subtitle">List of <code>Content</code>.</h6>
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">S/N</th>
                           <th scope="col">Title</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($contents as $index=>$item)
                        <tr>
                           <td>{{ ++$index }}</td>
                           <td>{{ $item->title }}</td>
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
                                             <h5 class="modal-title" id="exampleModalLongTitle">Update Level</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form class="m-t-40" method="post" action="{{ route('topiccontent.update',$item->id ) }}" enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <div class="form-group">
                                                         <h4 class="card-title">Title</h4>
                                                         <input type="text" name = "title" class="form-control form-control-line" value="{{ $item->title }}" required>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="card">
                                                   <div class="card-body">
                                                      <h4 class="card-title">Content</h4>
                                                      <textarea name="content" id="description-ckeditor" class="ckeditor" required>
                                                                           {!! $item->content !!}
                                                                        </textarea>
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
                                 <form id="delete-form-{{ $item->id }}" action="{{route('topiccontent.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                 </form>
                                 {{-- <a href="{{ route('add.heading.content',$item->id) }}" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip" data-original-title="Add Content">
                                 <i class="fa fa-plus">Add Content</i>
                                 </a> --}}
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
