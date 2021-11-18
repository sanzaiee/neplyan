@extends('dashboard.master')
@section('content')
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">F&Q </h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
            </ol>
            <a href="{{ route('fnq.create') }}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                class="fa fa-plus-circle"></i> Add Content</button> </a>
        </div>
    </div>
</div>

<div class="row list-of-items">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">F&Q List</h4>
               
                <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                   <tr>
                                      <th scope="col">S/N</th>
                                      <th scope="col">Question</th>
                                      <th scope="col">Answer</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   @forelse ($fnqs as $index=>$item)
                                       <tr>
                                        <td>{{ ++$index }}</td>

                                           <td>{{ $item->question }}</td>
                                           <td>{{ $item->answer }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-success m-r-5 m-b-5">Active</span>
                                                @else
                                                    <span class="badge badge-danger m-r-5 m-b-5">Banned</span>
                                                @endif
                                            </td>
                                           <td>
                                                <a href="{{ route('fnq.edit',$item->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                                data-original-title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $item->id }}" action="{{route('fnq.destroy',$item->id)}}" method="post">
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
<script>
    function ConfirmDelete(id)
     {
     var x = confirm("Are you sure you want to delete?");
     if (x)
 window.location.href=`/term/${id}/delete`;
     else
         return false;
     }
</script>




