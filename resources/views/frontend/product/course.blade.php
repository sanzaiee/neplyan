@extends('frontend.master')
@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="title-group">
                <h1 class="main-title">
                    {{!$edu ? $semester->level->material->name : $education->name ." "."Material"}}
                </h1>
            </div>
            <div class="breadcrumbs">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        @if ($edu != 1)
                            <li class="breadcrumb-item active" aria-current="page">{{ $semester->level->material->education->name }} / {{ $semester->level->material->name }} / {{ $semester->level->name }} / {{ $semester->name }}</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $education->name }}</li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="course-inner-section">
        <div class="container">
            <div class="row">
                @forelse ($products as $item)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="popular">
                            <div class="content">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ $item->image }}">
                                {{-- <div class="content-details fadeIn-bottom">
                                    <div class="question-button">
                                        <h3><a href="{{ route('question.show',$item->slug) }}">Question Set</a></h3>
                                    </div>
                                </div> --}}
                            </a>
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
                                        <p><i class="fa fa-money"></i> Free</p>
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
                    
                    
                    
                    
                            <!--<div class="price">-->
                            <!--    <div class="student">-->
                            <!--        <a href="{{ route('payment.mode',$item->slug) }}"><button>Buy Now</button></a>-->
                            <!--    </div>-->
                            <!--    <div class="fee">-->
                            <!--        <p><i class="fa fa-money"></i> {{ $item->price }}</p>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 col-lg-12">
                        <div class="popular">
                            <div class="popular-info">
                                <h3>No, {{!$edu ? $semester->level->material->name : $education->name ." "."Material"}}!! We will update soon....</h3>
                            </div>
                        </div>
                    </div>
                @endforelse
                    {{$products->links()}}
            </div>
        </div>
    </section>

@endsection
