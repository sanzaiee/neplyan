@extends('dashboard.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Paid Products</h4>
              <h6 class="card-subtitle">
                </h6>
        </div>
        <div class="col-md-7 align-self-center text-right">
           
        </div>
    </div>


    <div class="nav nav-tabs nav-fill tabforheadingandquestion" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Educational Products </a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Other Products</a>
      </div>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div id="educational">
            <div class="row">
                @forelse ($products as $item)
                    <div class="col-md-3 wow fadeIn mb-2" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                        <div class="list__categories">
                            <div class="thumb__catrgories">
                                <a href="#">
                                    <img src="{{ $item->product->image}}" alt="post images">
                                </a>
                            </div>
                            <div class="desc__categories">
                                <div class="categories__content">
                                    <h6><a href="#">{{ $item->product->name}}</a></h6>
                                    <!--{!! $item->product->description !!}-->
                                    <div class="p-amount">
                                        <span>{{ $item->product->education->name }}</span>
                                        <span class="count">{{ $item->product->semester->level->material->name }}</span>
                                        <span class="count">{{ $item->product->semester->level->name }}</span>
                                        <span class="count">{{ $item->product->semester->name }}</span>
                                        {{-- <span class="count">{{ $item->product->name }}</span> --}}
                                    </div>
                                    <div class="cat__btn">
                                        <a class="shopbtn" href="{{ route('read.content',$item->product->slug) }}" target="_blank">Read</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-popular-info text-center">
                            <h4>{{ucfirst($item->product->name)}}</h4>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div id="otherss">
            <div class="row">
                @forelse ($other_products as $item)
                    <div class="col-md-3 wow fadeIn mb-2" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                        <div class="list__categories">
                            <div class="thumb__catrgories">
                                <a href="#">
                                    <img src="{{ $item->other_product->image}}" alt="post images">
                                </a>
                            </div>
                            <div class="desc__categories">
                                <div class="categories__content">
                                    <h6><a href="#">{{ $item->other_product->name}}</a></h6>
                                    <!--{!! $item->other_product->description !!}-->
                                    <div class="p-amount">
                                        <span>{{ $item->other_product->other->name }}</span>
                                        {{--  <span class="count">Per Night</span>  --}}
                                    </div>
                                    <div class="cat__btn">
                                        <a class="shopbtn" href="{{ route('read.otherproduct',$item->other_product->slug) }}" target="_blank">Read</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-popular-info text-center">
                            <h3>{{ $item->other_product->name}}</h3>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>

        </div>
        </div>
    </div>
</div>

@endsection





