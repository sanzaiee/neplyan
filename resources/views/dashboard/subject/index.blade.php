@extends('dashboard.master')
@section('content')
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Subjects </h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                <li class="breadcrumb-item active">All Content </li>
            </ol>
            <a href="{{ route('subject.create') }}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                class="fa fa-plus-circle"></i> Create Content</button> </a>
        </div>
    </div>
</div>

<div class="row list-of-items">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Subject List</h4>
                <h6 class="card-subtitle">
                    @include('message')
                </h6>
                <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                   <tr>
                                      <th scope="col">S/N</th>
                                      {{-- <th scope="col">Image</th> --}}
                                      <th scope="col">Title</th>
                                      <th scope="col">Education</th>
                                      <th scope="col">Material</th>
                                      <th scope="col">Level</th>
                                      <th scope="col">Semester</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   @forelse ($subjects as $index=>$item)
                                       <tr>
                                        <td>{{ ++$index }}</td>

                                           {{-- @if ($item->image)
                                               <td><img src="{{ asset($item->image) }}" width="100px" height="100px"></td>
                                           @else
                                               <td>No image</td>
                                           @endif --}}

                                           <td>{{ $item->name }}</td>
                                           <td>{{ $item->education->name }}</td>
                                           <td>{{ $item->material->name }}</td>
                                           <td>{{ $item->level->name}}</td>
                                           <td>{{ $item->semester->name }}</td>

                                           @if ($item->status ==1 )
                                               <td class="text-success">Active</td>
                                           @else
                                               <td class="text-danger">InActive</td>
                                               @endif
                                           <td>
                                                <a href="{{ route('add.book.content',$item->id) }}" target="blank" class="btn btn-rounded btn-sm btn-primary m-r-5" data-toggle="tooltip" data-original-title="Add Content">
                                                    <i class="fa fa-plus"></i>
                                                </a>

                                                <a href="{{ route('subject.edit',$item->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5" data-toggle="tooltip"
                                                data-original-title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $item->id }}" action="{{route('subject.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>

                                                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                                    <input value="100" name="tAmt" type="hidden">
                                                    <input value="90" name="amt" type="hidden">
                                                    <input value="5" name="txAmt" type="hidden">
                                                    <input value="2" name="psc" type="hidden">
                                                    <input value="3" name="pdc" type="hidden">
                                                    <input value="EPAYTEST" name="scd" type="hidden">
                                                    <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                                                    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                                                    <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                                                    <input value="Buy" class="btn btn-success" type="submit">
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





