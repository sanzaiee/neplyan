@extends('dashboard.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Contact Message</h4>

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
                    <h4 class="card-title">Contact Message List</h4>
                    
                    <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Email</th>
                                        <!--<th scope="col">Subject</th>-->
                                        <!--<th scope="col">Message</th>-->
                                        <th scope="col">Status</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($message as $index=>$item)
                                        <tr>
                                            <td>{{ ++$index }}</td>

                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->email }}</td>
                                            <!--<td>{{ $item->subject }}</td>-->
                                            <!--<td>{{ $item->message }}</td>-->
                                           <td>
                                                @if($item->status == 0)
                                                    <a href="{{route('contact.read.status',$item->id)}}">
                                                        <span class="badge badge-danger m-r-5 m-b-5">unread</span>
                                                    </a>
                                                @else
                                                   <a href="{{route('contact.read.status',$item->id)}}">
                                                        <span class="badge badge-success m-r-5 m-b-5">read</span>
                                                    </a>
                                                @endif
                                            </td>
                                            {{-- <td>
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
                                                </td> --}}
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
{{-- <script>
    function ConfirmDelete(id)
     {
     var x = confirm("Are you sure you want to delete?");
     if (x)
 window.location.href=`/term/${id}/delete`;
     else
         return false;
     }
</script> --}}




