@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">Questions </h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
         <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                {{--  <li class="breadcrumb-item"><a href="{{ route('education.create', $semesters->level->material->education->name) }} ">{{ $semesters->level->material->education->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('add.material', $semesters->level->material->education->slug) }} ">{{ $semesters->level->material->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('add.level', $semesters->level->material->slug) }} ">{{ $semesters->level->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('add.semester', $semesters->level->slug) }} ">{{ $semesters->name }}</a></li>  --}}
            </ol>
            <a href="{{ route('direct.add.question',$productslug) }}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
               class="fa fa-plus-circle"></i> Add Question</button> </a>
         </div>
      </div>
   </div>
   <div class="row list-of-items">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Product List</h4>
               <h6 class="card-subtitle">List of <code>Product</code>.</h6>
               <h6 class="card-subtitle">@include('message') </h6>
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">S/N</th>
                           <th scope="col">Name</th>
                           {{--  <th scope="col">Questions</th>  --}}
                           <th scope="col">Questions PDF</th>
                           {{--  <th scope="col">Material</th>
                           <th scope="col">Level</th>
                           <th scope="col">Semester</th>  --}}
                           <th scope="col">Description</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($questions as $index=>$item)
                        <tr>
                           <td>{{ ++$index }}</td>
                           {{--  <td><img src="{{ $item->image }}" alt="" height="100px" width="100px"></td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->semester->level->material->education->name }}</td>
                           <td>{{ $item->semester->level->material->name }}</td>
                           <td>{{ $item->semester->level->name }}</td>
                           <td>{{ $item->semester->name }}</td>
                           @if ($item->approve == 1 )
                           <td class="text-success">Approved</td>
                           @else
                           <td class="text-danger">Not Approved</td>
                           @endif  --}}
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
                                             <form class="m-t-40" method="post" action="{{ route('question.update',$item->id ) }}" enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <input type="hidden" name="semester_id" value="{{ $item->semester_id }}">
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
@endsection
