@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">Products </h4>
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
               <h6 class="card-subtitle">List of <code>Clients</code>.</h6>
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">S/N</th>
                           <th scope="col">Client Name</th>
                           <th scope="col">Client Email</th>
                           <th scope="col">Client Address</th>
                           <th scope="col">Client Phone</th>
                           <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($totalUsers as $index=>$item)
                        <tr>
                           <td>{{ ++$index }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->email }}</td>
                           <td>{{ $item->address }}</td>
                           <td>{{ $item->mobile }}</td>
                           @if ($item->status ==1 )
                           <td class="text-success">Active</td>
                           @else
                           <td class="text-danger">InActive</td>
                           @endif

                        </tr>
                        @empty
                        <h1>You have no any clients yet...</h1>
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
