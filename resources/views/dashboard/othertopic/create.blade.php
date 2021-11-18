@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">
         Update Content For {{ $other->name }}
         <h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
         <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
               <li class="breadcrumb-item active">Add Content </li>

                <li class="breadcrumb-item active">
                    <a href="{{ route('other.product.index') }} ">Other Products List</a>
                </li> 
            </ol>
         </div>
      </div>
   </div>
   <ul class="nav nav-pills mb-3 tabforheadingandquestion" id="pills-tab" role="tablist">
      <li class="nav-item list-of-items">
         <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Content for {{ $other->name }}</a>
      </li>
      <!--<li class="nav-item list-of-items">-->
      <!--   <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Question for {{ $other->name }}</a>-->
      <!--</li>-->
   </ul>
   <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="row list-of-items">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Create Heading</h4>
                     <h6 class="card-subtitle">Please <code>fill Up</code> all the fields.</h6>
                     <form method="post" action="{{ route('othertopic.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="other_product_id" id="" value="{{ $other->id }}">
                        <div class="card">
                           <div class="card-body">
                              <div class="form-group">
                                 <h4 class="card-title">Heading</h4>
                                 <input type="text" name = "heading" class="form-control form-control-line" required>
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <div class="form-group">
                                 <h4 class="card-title">Title</h4>
                                 <input type="text" name = "title" class="form-control form-control-line" required>
                              </div>
                           </div>
                        </div>
                        
                        <div class="row">
                          <div class="card col-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Has Page Number???</h4>
                                    <select name="page_status" class="form-control form-control-line" required>
                                       <option>--please select--</option>

                                        <option value ="1">Yes</option>
                                        <option value ="0">No</option>

                                    </select>
                                 
                                </div>
                            </div>
                        </div>

                      <div class="card col-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Is it a Main Header??</h4>
                                   <select name="is_chapter" class="form-control form-control-line" required>
                                       <option>--please select--</option>

                                        <option value ="1">Yes</option>
                                        <option value ="0">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Content</h4>
                                <textarea name="description" id="description-ckeditor" class="ckeditor">
                                </textarea>
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
                     <h4 class="card-title">Heading List</h4>
                     <h6 class="card-subtitle">List of <code>Heading</code>.</h6>
                     <div class="table-responsive m-t-40">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th scope="col">S/N</th>
                                 <th scope="col">Heading</th>
                                 <th scope="col">Title</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @forelse ($headings as $index=>$item)
                              <tr>
                                            <td>{{$loop->iteration }}</td>
                                 <td>{{ $item->heading }}</td>
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
                                       <a href="" data-toggle="modal" data-target="#{{ $item->id }}modal1" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                       <i class="fa fa-pencil"></i>
                                       </a>
                                       <div class="modal fade" id="{{ $item->id }}modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                             <div class="modal-content rose">
                                                <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLongTitle">Update Content</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                   </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form class="m-t-40" method="post" action="{{ route('othertopic.update',$item->id ) }}" enctype="multipart/form-data">
                                                      <input type="hidden" name="_method" value="PUT">
                                                      @csrf
                                                      <input type="hidden" name="other_id" value="{{ $other->id }}">
                                                      <div class="card">
                                                         <div class="card-body">
                                                            <div class="form-group">
                                                               <h4 class="card-title">Heading</h4>
                                                               <input type="text" name = "heading" class="form-control form-control-line" value="{{ $item->heading }}" required>
                                                            </div>
                                                         </div>
                                                      </div>
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
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Is it a Main Header??</h4>
                                                                       <select name="is_chapter" class="form-control form-control-line" required>
                                                                           <option>--please select--</option>
                                    
                                                                            <option value ="1" @if($item->is_chapter == 1) selected @endif>Yes</option>
                                                                            <option value ="0" @if($item->is_chapter == 0) selected @endif>No</option>
                                    
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <h4 class="card-title">Has a page number??</h4>
                                                                       <select name="page_status" class="form-control form-control-line" required>
                                                                           <option>--please select--</option>
                                    
                                                                            <option value ="1" @if($item->page_status == 1) selected @endif>Yes</option>
                                                                            <option value ="0" @if($item->page_status == 0) selected @endif>No</option>
                                    
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                      <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Content</h4>
                                                            <textarea name="description" id="my-editor-{{$index}}" required>
                                                                {{ $item->description }}
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
                                       <form id="delete-form-{{ $item->id }}" action="{{route('othertopic.destroy',$item->id)}}" method="post">
                                          @csrf
                                          @method('delete')
                                       </form>
                                       <!--<a href="{{ route('add.othertopic.content',$item->id) }}" target="blank" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip" data-original-title="Add Content">-->
                                       <!--<i class="fa fa-plus">Add Content</i>-->
                                       <!--</a>-->
                                    </div>
                                    {{-- <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i>Add Content</button> --}}
                                 </td>
                              </tr>
                              
                                 @section('ckdynamic')
                                     @forelse ($headings as $index=>$item)
                                     
                                        <script>
                                            CKEDITOR.replace('my-editor-{{$index}}', {
                                                        filebrowserBrowseUrl : "/SchoolImageuploader/kcfinder/browse.php?opener=ckeditor&type=files",
                                                
                                                        filebrowserImageBrowseUrl :"/SchoolImageuploader/kcfinder/browse.php?opener=ckeditor&type=images",
                                                
                                                        filebrowserFlashBrowseUrl :"/SchoolImageuploader/kcfinder/browse.php?opener=ckeditor&type=flash",
                                                
                                                        filebrowserUploadUrl:"/SchoolImageuploader/kcfinder/upload.php?opener=ckeditor&type=files",
                                                
                                                        filebrowserImageUploadUrl :"/SchoolImageuploader/kcfinder/upload.php?opener=ckeditor&type=images",
                                                
                                                        filebrowserFlashUploadUrl :"/SchoolImageuploader/kcfinder/upload.php?opener=ckeditor&type=flash"
                                                });
                                        </script>
                                        @empty
                                        @endforelse
                                    @endsection
                                                                
                                                                
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
         <div class="container-fluid">
            <div class="list-of-items">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Question</h4>
                     <h6 class="card-subtitle">
                        Please <code>fill up</code> all the fields.
                     </h6>
                     <h6 class="card-subtitle">
                        @include('message')
                     </h6>
                     <form method="post" action="{{ route('other.question.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="other_product_id" value="{{ $other->id }}">
                        <div class="row list-of-items">
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="form-group">
                                       <h4 class="card-title">Question Name</h4>
                                       <input type="text" name = "name" class="form-control form-control-line"  value="{{ $subject->name ?? '' }}" required>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <h4 class="card-title">Question Content(Optional)</h4>
                                    <label for="input-file-now">Please select your question content.</label>
                                    <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $subject->image ?? '' }}"/>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row list-of-items">
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <h4 class="card-title">Description</h4>
                                    <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                            </textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <h4 class="card-title">Question Content</h4>
                                    <textarea name="question" id="description-ckeditor" class="ckeditor" required>
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
            <div class="row list-of-items">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title">Question List</h4>
                        <h6 class="card-subtitle">List of <code>Product</code>.</h6>
                        {{-- <h6 class="card-subtitle">@include('message') </h6> --}}
                        <div class="table-responsive m-t-40">
                           <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Questions PDF</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @forelse ($questions as $index=>$item)
                                 <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if ($item->image)
                                    @php
                                    $cut = explode('.', $item->image);
                                    @endphp
                                    @if ($cut[1] == "pdf")
                                    <td><img src="{{asset('dummyPDF.png') ?? '' }}" alt="no image" height="100px" width="100px"></td>
                                    @else
                                    <td><img src="{{ $item->image ?? '' }}" alt="no image" height="100px" width="100px"></td>
                                    @endif
                                    @elseif($item->question)
                                    <td>{!! $item->question !!}</td>
                                    @endif
                                    <td>{!! $item->description !!}</td>
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
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                      </button>
                                                   </div>
                                                   <div class="modal-body">
                                                      <form class="m-t-40" method="post" action="{{ route('other.question.update',$item->id ) }}" enctype="multipart/form-data">
                                                         <input type="hidden" name="_method" value="PUT">
                                                         @csrf
                                                         <input type="hidden" name="other_product_id" value="{{ $item->other_product_id }}">
                                                         <div class="card">
                                                            <div class="card-body">
                                                               <div class="from-group">
                                                                  <h4 class="card-title">Question Content</h4>
                                                                  <label for="input-file-now">Please select you pdf content.</label>
                                                                  <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $item->image ?? '' }}"/>
                                                               </div>
                                                               <div class="form-group">
                                                                  <h4 class="card-title">Question Name</h4>
                                                                  <input type="text" name = "name" class="form-control form-control-line" value="{{ $item->name }}" required>
                                                               </div>
                                                               <div class="form-group">
                                                                  <h4 class="card-title">Description</h4>
                                                                  <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                                                      {!! $item->description ?? '' !!}
                                                                  </textarea>
                                                               </div>
                                                               <div class="form-group">
                                                                  <h4 class="card-title">Question Content</h4>
                                                                  <textarea name="question" id="description-ckeditor" class="ckeditor" required>
                                                                      {!! $item->question ?? '' !!}
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
                                             onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form1-{{ $item->id }}').submit();">
                                          <i class="fa fa-trash"></i>
                                          </a>
                                          <form id="delete-form1-{{ $item->id }}" action="{{route('other.question.destroy',$item->id)}}" method="post">
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
</div>
@endsection
