@extends('frontend.master')

@section('content')

@include('frontend.partials.banner')
@include('frontend.partials.about-section')

<section class="ads-section">
     <div class="container">
       <img src="../frontend/image/ads.gif" class="w-100">
{{--              <img src="{{asset($advert->image)}}" class="w-100"> --}}

     </div>
   </section>
@forelse ($education as $index=> $edu)
@if($index < 3)
    <section class="course-section">
    <div class="container">
        <div class="topic">
            <div class="heading pull-left">
                <h2>{{ $edu->name }}</h2>
            </div>
            <div class="all-course pull-right">
                <a href="{{ route('education.product.list',$edu->slug) }}"><button>View All Books</button></a>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel book-slide owl-theme pl-3">

            @forelse ($edu->approveprod as $index => $item)
            @if($index < 9)
                <div class="popular">
                    <div class="content">
                        <div class="content-overlay"></div>
                            <img class="content-image" src="{{ $item->image }}">
                        <div class="content-details fadeIn-bottom">
                            {{-- <div class="question-button">
                                <h3><a href="{{ route('question.show',$item->slug) }}">Question Set</a></h3>
                            </div> --}}
                        </div>
                    </div>
                    
                    <div class="popular-info">
                            <h3><a href="{{ route('product.detail',$item->slug) }}">{{ $item->name }}</a></h3>
                    </div>
                    
                    @if($item->free == 1)
                        <div class="price">
                            <div class="student">
                                <a href="{{ route('read.content',$item->slug) }}" target="_blank"><button>Read</button></a>
                            </div>
                            <div class="fee">
                                <p><i class="fa fa-money"></i>Free</p>
                            </div>
                        </div>
                    @else
                        <div class="price">
                            <div class="student">
                                <a href="{{ route('payment.mode',$item->slug) }}"><button>Buy Now</button></a>
                            </div>
                            <div class="fee">
                                <p><i class="fa fa-money"></i> {{ $item->price }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                @endif
            @empty
                <div class="popular-info not-available">
                    <h3>Sorry!! No Books We will update soon....</h3>
                </div>
            @endforelse




            </div>
        </div>
    </div>
    </section>
                @endif

@empty
@endforelse

<div class="container moretext">
    @forelse ($education as $index => $edu)
    
    @if($index > 2)

        <section class="course-section">
            <div class="topic">
                <div class="heading pull-left">
                    <h2>{{ $edu->name }}</h2>
                </div>
                <div class="all-course pull-right">
                    <a href="{{ route('education.product.list',$edu->slug) }}"><button>View All Books</button></a>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel book-slide owl-theme pl-3">
    
                @forelse ($edu->product as $index => $item)
                @if($index < 9)
                    <div class="popular">
                        <div class="content">
                            <div class="content-overlay"></div>
                                <img class="content-image" src="{{ $item->image }}">
                            <div class="content-details fadeIn-bottom">
                                {{-- <div class="question-button">
                                    <h3><a href="{{ route('question.show',$item->slug) }}">Question Set</a></h3>
                                </div> --}}
                            </div>
                        </div>
                        <div class="popular-info">
                            <h3><a href="{{ route('product.detail',$item->slug) }}">{{ $item->name }}</a></h3>
                        </div>
                        <div class="price">
                            <div class="student">
                                <a href="{{ route('payment.mode',$item->slug) }}"><button>Buy Now</button></a>
                            </div>
                            <div class="fee">
                                <p><i class="fa fa-money"></i> {{ $item->price }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @empty
                    <div class="popular-info not-available">
                        <h3>Sorry!! No Books We will update soon....</h3>
                    </div>
                @endforelse
    
    
    
    
                </div>
        </div>
        </section>
   @endif
    @empty
    
    @endforelse
    
    
     @forelse ($others as $index => $edu)
    

        <section class="course-section">
            <div class="topic">
                <div class="heading pull-left">
                    <h2>{{ $edu->name }}</h2>
                </div>
                <div class="all-course pull-right">
                    <a href="{{ route('other.product.list',$edu->slug) }}"><button>View All Books</button></a>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel book-slide owl-theme pl-3">
    
                @forelse ($edu->otherApprove as $index => $item)
                @if($index < 9)
                    <div class="popular">
                        <div class="content">
                            <div class="content-overlay"></div>
                                <img class="content-image" src="{{ $item->image }}">
                            <div class="content-details fadeIn-bottom">
                                {{-- <div class="question-button">
                                    <h3><a href="{{ route('question.show',$item->slug) }}">Question Set</a></h3>
                                </div> --}}
                            </div>
                        </div>
                        <div class="popular-info">
                            <h3><a href="{{ route('product.detail',$item->slug) }}">{{ $item->name }}</a></h3>
                        </div>
                        <div class="price">
                            <div class="student">
                                <a href="{{ route('payment.mode',$item->slug) }}"><button>Buy Now</button></a>
                            </div>
                            <div class="fee">
                                <p><i class="fa fa-money"></i> {{ $item->price }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @empty 
                    <div class="popular-info not-available">
                        <h3>Sorry!! No Books We will update soon....</h3>
                    </div>
                @endforelse
    

    
                </div>
        </div>
        </section>
    @empty
    
    @endforelse
    
   

</div>

<div class="container">
    <div class="text-center">
        <a class="moreless-button">Show All University</a>
    </div>
</div>
  


@endsection


