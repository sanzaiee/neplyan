
@extends('frontend.master')
@section('content')

        <section class="banner-section">
            <div class="container">
                <div class="title-group">
                    <h1 class="main-title">
                        Book Details
                    </h1>
                </div>
                <div class="breadcrumbs">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="course-detail-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="course-image">
                            <div class="course-category-teacher">
                                <div class="course-teacher-name">
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="info">
                                        <span class="label">Writer</span>
                                        <div class="value">
                                            {{ $product->author }}
                                        </div>
                                    </div>
                                </div>
                                <div class="course-category-name">
                                    <div class="icon">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <div class="info">
                                        <div class="value">
                                            {{ $product->education->name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="course-category-name">
                                    <div class="info">
                                        <div class="value">
                                            {{ $product->semester->level->material->name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="course-category-name">
                                    <div class="info">
                                        <div class="value">
                                            {{ $product->semester->level->name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="course-category-name">
                                    <div class="info">
                                        <div class="value">
                                            <a href="#">{{ $product->semester->name }}</a>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="course-category-name">

                                    <div class="info">
                                        <div class="value">
                                            <a href="#">{{ $product->material->name }}</a>
                                        </div>
                                    </div>
                                </div> --}}


                            </div>
                            <div class="course-category-image">
                                <img class="w-100" src="{{ $product->image }}" />
                            </div>
                        </div>
                        <div class="course-category-info">
                            <div class="introduction-part">
                                <h4>{{ $product->name }}</h4>
                                <p>
                                  {!! $product->description !!}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 make-me-sticky">
                        <div class="right-sidebar-course-feature">
                            
                    @if($product->free == 1)
                    
                            <div class="course-price">
                                <h5>Free</h5>
                                <!--<p>Price:</p>-->
                                <!--<h2>Nrs. <span>{{ $product->price }}</span></h2>-->
                                <a href="{{ route('read.content',$product->slug) }}" target="_blank"><button>Read</button></a>
                            </div>
                 
                    @else
                    
                    
                   <div class="course-price">
                                <h5>Find the rarest ones here</h5>
                                <p>Price:</p>
                                <h2>Nrs. <span>{{ $product->price }}</span></h2>
                                <a href="{{ route('payment.mode',$product->slug) }}"><button>Buy Now</button></a>
                            </div>
                    @endif
                    
                    
                           

                        </div>

                    </div>
                </div>
            </div>
        </section>

@endsection
