@extends('frontend.master')
@section('content')
<section class="banner-section">
            <div class="container">
                <div class="title-group">
                    <h1 class="main-title">
                        Events
                    </h1>
                </div>
                <div class="breadcrumbs">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <section class="event-inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                    @forelse ($events as $item)
                        <div class="col-md-12">
                            <div class="event">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="date">
                                            <span class="date-day">{{ $item->created_at->format('d') }}</span>
                                            <span class="date-month">{{ $item->created_at->format('m') }}</span>
                                        </div>
                                    </div>
                                <div class="col-md-10">
                                    <div class="event-content">
                                        <div class="event-time">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{ $item->start }} - {{ $item->end }} </span>
                                            <span class="address"><i class="fa fa-clock-o"></i> {{ $item->address }}</span>
                                        </div>
                                        <div class="event-name">
                                            <h4><a href="{{ route('event.detail',$item->slug) }}">{{ $item->name }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    @empty

                    @endforelse



               </div>
                    </div>

                </div>
            </div>
        </section>


        @endsection
