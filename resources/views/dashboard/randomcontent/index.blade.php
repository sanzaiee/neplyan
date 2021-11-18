@extends('dashboard.master')
@section('content')
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Random Contents </h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                <li class="breadcrumb-item active">All Content </li>
            </ol>
            <a href="{{ route('random.create') }}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                class="fa fa-plus-circle"></i> Create Content</button> </a>
        </div>
    </div>
</div>

<div class="row list-of-items">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Random Content List</h4>
               
                <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                   <tr>
                                      <th scope="col">S/N</th>
                                      <th scope="col">Content</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   @forelse ($contents as $index=>$item)
                                       <tr>
                                        <td>{{ ++$index }}</td>

                                           @if ($item->content_type == 1)
                                               <td><img src="{{ asset($item->content) }}" width="100px" height="100px"></td>
                                           @else
                                                 <td><img src="{{ asset('dummyPdf.png') }}" width="100px" height="100px"></td>
                                           @endif

                                           <td>{{ $item->name }}</td>

                                           <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success m-r-5 m-b-5">Active</span>
                                            @else
                                                <span class="badge badge-danger m-r-5 m-b-5">Banned</span>
                                            @endif
                                            </td>
                                           <td>
                                                <a href="{{ route('random.edit',$item->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                                data-original-title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $item->id }}" action="{{route('random.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
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





