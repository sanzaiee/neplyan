@extends('dashboard.master')
@section('content')
<style>
    .edu-list{
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        align-content: space-around;
        justify-content: space-between;
    }
    
    
</style>
<div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="text-themecolor"> Your Products </h4>
        </div>

        <div class="col-md-6 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row page-user">

        <div class="col-md-6">
            <a href="{{ route('productBy.user') }}">
                <div class="card p-5">
                    <div class="body">
                        <h4 class="card-title text-primary text-center">Educational Products</h4>
                        <h6 class="card-subtitle text-center">Collection of <code>Educational</code> Products.</h6>
                        
                        @php
                            $educations = App\Education::where('status',1)->get();
                        @endphp
                        <ul class="edu-list">
                            @forelse($educations as $item)
                    
                                <li>
                                    <a href="{{route('productbyeducationslug',$item->slug)}}" target="_blank">
                                        <button class="btn btn-info">{{$item->name}}</button>
                                    </a>
                               </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-6">
            <a href="{{ route('otherproductBy.user') }}">
                <div class="card p-5">
                    <div class="body">
                        <h4 class="card-title text-primary text-center">Other Products</h4>
                        <h6 class="card-subtitle text-center">Collection of <code>Other</code> Products.</h6>
                        
                        
                          @php
                            $cats = App\Other::where('status',1)->get();
                        @endphp
                        <ul class="edu-list">
                            @forelse($cats as $item)
                                <li>
                                    <a href="{{route('productbyothereducationslug',$item->slug)}}" target="_blank">
                                        <button class="btn btn-info">{{$item->name}}</button>
                                    </a>
                               </li>
                            @empty
                            @endforelse
                        </ul>
                        
                        
                    </div>
                </div>
            </a>
        </div>


    </div>



</div>

@endsection
