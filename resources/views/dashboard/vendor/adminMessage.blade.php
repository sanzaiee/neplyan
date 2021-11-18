@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Messages</h4>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">
        @forelse ($messages as $item)
            <div class="col-md-12">
                <div class="n-testimonal-box">
                    <div class="row n-testimonal-text">
                        <div class="col-md-9">
                            <h2>{{ $item->subject }}</h2>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-2">
                            {{ $item->created_at->diffForHumans()}}
                        </div>
                        <div class="col-md-12">
                            <h4> {!! $item->message !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
        {{ $messages->links() }}
    </div>


</div>
@endsection
