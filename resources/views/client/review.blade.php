@extends('client.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Your comments</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Review </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">
        @forelse ($comments as $item)
            <div class="col-md-12">
                <div class="n-testimonal-box">
                    <div class="row n-testimonal-text">
                        <div class="col-md-3">
                            <img src="{{ $item->blog->image }}" alt="" width="100%" height="100%">
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8">

                        <a href="" class="btn btn-rounded btn-xs btn-danger m-r-5 comment-delete" data-toggle="tooltip"
                            data-original-title="Delete"
                            onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                            <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $item->id }}" action="{{route('comment.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            </form>

                            <h2>{{ $item->blog->name }}</h2>
                            <h4> {!! $item->comment !!}</h4>

                            <div class="line"></div>

                            @if ($item->status == 1)
                                <span class="text-success">Your Comment is featured.</span>
                            @else
                                <span class="text-danger">Your Comment isn't featured.</span>
                            @endif
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
        </div>
</div>
@endsection
