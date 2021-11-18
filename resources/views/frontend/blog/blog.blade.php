@extends('frontend.master')
@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="title-group">
                <h1 class="main-title">
                    Blogs @if($tag) of {{ $tag }} @endif
                </h1>
            </div>
            <div class="breadcrumbs">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('blog') }}">Blogs</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="blog-inner-section">
        <div class="container">
            <div class="row">
                @forelse ($blogs as $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="news">
                            <img src="{{ $item->image }}">
                            <div class="news-info">
                                <p>{{ $item->name }}</p>
                                <h5><a href="{{ route('blog.detail',$item->slug) }}">{!! $item->short_description !!}</a></h5>
                                <span><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $item->created_at }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <h5>Sorry!! We Will Update Content Soon...</h5>
                @endforelse
            </div>
        </div>
    </section>
@endsection

