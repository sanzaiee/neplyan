@extends('frontend.master')
@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="title-group">
                <h1 class="main-title">
                Notice
                </h1>
            </div>
            <div class="breadcrumbs">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notice</li>
                    </ol>
                </nav>
            </div>
        </div>
        </section>
        <section class="notice-section">
        <div class="container">
        <div class="row">
            @forelse ($notices as $item)
                <div class="col-md-4">
                    <div class="single-download mb-5">
                        <div class="download-img">
                            @php
                                $cut = explode('.', $item->image);
                            @endphp
                            @if ($item->contentType == 0)
                            <td><img src="{{asset('dummyPDF.png') ?? '' }}" alt="no image" height="100px" width="100px"></td>
                            @else
                            <td><img src="{{ $item->content ?? '' }}" alt="no image"></td>
                            @endif
                        </div>
                        <div class="download-content-wrap">
                            <span></i> Notice </span>
                            <div class="download-content">
                                <h4><a href="{{ route('notice.detail',$item->slug) }}">{{ $item->name }}</a></h4>
                                <div class="download-meta">
                                    <ul>
                                        <li><a href="{{ route('notice.detail',$item->slug) }}"><i class="fa fa-calendar-o"></i> {{ $item->created_at }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="download-date">
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse


        </div>
        </div>
</section>
@endsection
