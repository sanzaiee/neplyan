@extends('dashboard.master')
@section('content')
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Clients List</h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row list-of-items">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Client List</h4>
                
                <div class="table-responsive m-t-40">
                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th scope="col">S/N</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>  
                              <th scope="col">Mobile Number</th>
                              <th scope="col">Product List</th>
                              <th scope="col">Action</th>

                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($subscribers as $index=>$item)
                               <tr>
                                <td>{{ ++$index }}</td>
                                   <td>{{ $item->name }}</td>
                                   <td>{{ $item->email }}</td>
                                  
                                     <td>{{ $item->mobile }}</td>
                                 
                                    <td> <a href="{{ route('subscribe.courselist',$item->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" target="blank"> Subscribed Products</a></td>
                                   <td>
                                    <a href="{{ route('private.create',["client",$item->id]) }}" data-toggle="tooltip" data-original-title="Send Message" target="_blank">
                                            <span class="badge badge-info m-r-5 m-b-5"><i class="fa fa-envelope"></i>   Send</i></span>

                                        </a>
                                    <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                    data-original-title="Delete"
                                    onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{route('client.destroy',$item->id)}}" method="post">
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





