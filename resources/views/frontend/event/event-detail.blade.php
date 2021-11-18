@extends('frontend.master')
@section('content')

<section class="banner-section">
  <div class="container">
    <div class="title-group">
      <h1 class="main-title">
         {{ ucfirst($event->name) }}
      </h1>
    </div>
    <div class="breadcrumbs">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Event Detail</li>
        </ol>
      </nav>
    </div>
  </div>
</section>
<section class="event-detail-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="event-detail-info">
            @if (pathinfo($event->image, PATHINFO_EXTENSION) == 'png' || pathinfo($event->image, PATHINFO_EXTENSION) == 'jpg' || pathinfo($event->image, PATHINFO_EXTENSION) == 'jepg')
                <img src="{{ $event->image }}" class="w-100">
            @else
                <iframe type="application/pdf" width="100%" src="{{$event->image }}"></iframe>
            @endif
          <div class="event-detail-info">
            <div class="row">
              <div class="col-md-4">
                <div class="media">
                  <i class="fa fa-clock-o"></i>
                  <div class="media-body">
                    <h5 class="mt-0">Start Time</h5>
                    <p>{{ $event->start }}</p>
                    {{-- <p>Monday, 10 Jun 2020</p> --}}
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="media">
                  <i class="fa fa-clock-o"></i>
                  <div class="media-body">
                    <h5 class="mt-0">End  Time</h5>
                    <p>{{ $event->end }}</p>
                    {{-- <p>Monday, 10 Jun 2020</p> --}}
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="media">
                  <i class="fa fa-map-marker"></i>
                  <div class="media-body">
                    <h5 class="mt-0">Address</h5>
                    <p>{{ $event->address }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="event-detail-information">
            <h4 class="mb-2">{{ $event->name }}</h4>
            {!! $event->description !!}
        </div>
        <div class="route-event-map mt-4">
            {!! $event->maplink !!}
        </div>
      </div>
      <div class="col-md-4 make-me-sticky">
        <div class="latest-blog">
            <h3 class="mt-0">Latest Post</h3>
            <div class="blog">

                @forelse ($events as $item)
                    <div class="single-blog">
                         @if (pathinfo($item->image, PATHINFO_EXTENSION) == 'png' || pathinfo($item->image, PATHINFO_EXTENSION) == 'jpg' || pathinfo($item->image, PATHINFO_EXTENSION) == 'jepg')
                            <img src="{{ $item->image }}">
                        @else
                            <img src="{{asset('dummyPdf.png') }}" width="30%">
                        @endif
                        <div class="text">
                            <p><a href="{{ route('event.detail',$item->slug) }}">{{ $item->name }}</a> </p>
                            <span>{{ $item->onDate }}</span>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>

  </div>
</div>
</div>
</section>

@endsection
