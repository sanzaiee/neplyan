@extends((auth()->check()) ? 'dashboard.master' : 'client.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Private Message From Admin</h4>

        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
              
         
            </div>
        </div>
    </div>

    <div class="row list-of-items">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Private Message From Admin</h4>
                    
                    <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Status</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($message as $index=>$item)
                                        <tr>
                                            <td>{{ ++$index }}</td>

                                            <td>{{ $item->subject }}</td>
                                           <td>
                                                @if($item->status == 0)
                                                    <a href="{{route('private.read.status',$item->id)}}">
                                                        <span class="badge badge-danger m-r-5 m-b-5">unread</span>
                                                    </a>
                                                @else
                                                   <a href="{{route('private.read.status',$item->id)}}">
                                                        <span class="badge badge-success m-r-5 m-b-5">read</span>
                                                    </a>
                                                @endif
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




