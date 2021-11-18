@extends('frontend.master')
@section('content')

<section class="banner-section">
    <div class="container">
        <div class="title-group">
            <h1 class="main-title">
                Questions
            </h1>
        </div>
        <div class="breadcrumbs">
            <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questions</li>
            </ol>
        </nav>
    </div>
</div>
</section>

<section class="question-set">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="question-list">
                    <h2>Question Set of {{ $prod->name }}</h2>
                    <p>{!! $prod->description !!}</p>
                    <ul>
                        @forelse ($question as $item)
                        @php
                            $url = explode('http://localhost:8000/',url()->current());
                            $urlss = explode('/',$url[1]);

                        @endphp

                        @if ($urlss[0] == "other-question")
                            <li><a href="{{route('other.question.detail',$item->slug)}}">{{ $item->name }}</a> </li>
                        @else
                            <li><a href="{{route('question.detail',$item->slug)}}">{{ $item->name }}</a> </li>
                        @endif
                        
                        @empty

                        @endforelse
                    </ul>
                </div>
            </div>
            {{--  <div class="col-md-4 make-me-sticky">
                <div class="list-info">
                   <h3>Our Question Sets</h3>
                   <div class="list-line"></div>
                   <ul>
                    @forelse ($question as $item)
                    <li><a href="#">{{ $item->name }}</a> </li>

                    @empty

                    @endforelse

                   </ul>
               </div>
            </div>  --}}
        </div>
    </div>
</section>

@endsection
