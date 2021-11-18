@extends('dashboard.master')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Heading for {{ $product->name }}<h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('product.index',$product->semester->slug)}}">Product By Semester</a> </li>
                </ol>

            </div>
        </div>
    </div>


    <div class="row list-of-items">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Heading</h4>
                    <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>

                    <form method="post" action="{{ route('topic.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" id="" value="{{ $product->id }}">

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Heading</h4>
                                <input type="text" name = "heading" class="form-control form-control-line" >
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h4 class="card-title">Title</h4>
                                <input type="text" name = "title" class="form-control form-control-line" >
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
                            <textarea name="description" id="description-ckeditor" data-maxlen='255' class="ckeditor">
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
                                                                         <h5 class="modal-title" id="exampleModalLongTitle">Update Level</h5>
                                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                         <span aria-hidden="true">&times;</span>
                                                                         </button>
                                                                      </div>
                                                                      <div class="modal-body">

                                                                        <form class="m-t-40" method="post" action="{{ route('topic.update',$item->id ) }}" enctype="multipart/form-data">
                                                                            <input type="hidden" name="_method" value="PUT">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <h4 class="card-title">Heading</h4>
                                                                                        <input type="text" name = "heading" class="form-control form-control-line" value="{{ $item->heading }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <h4 class="card-title">Title</h4>
                                                                                        <input type="text" name = "title" class="form-control form-control-line" value="{{ $item->title }}">
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
                                                                                    <textarea name="description"  id="my-editor-{{$index}}"  required>
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
                                                        <form id="delete-form-{{ $item->id }}" action="{{route('topic.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        </form>

                                                        <!--<a href="{{ route('read.content',"esewa-documentation-semester-1-mba-book-tribhuvan-university") }}" target="blank" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip" data-original-title="Add Content">-->
                                                        <!--    <i class="fa fa-plus">Read</i>-->
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
@endsection



