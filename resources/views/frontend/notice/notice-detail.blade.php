@extends('frontend.master')
@section('content')
<section class="banner-section">
   <div class="container">
      <div class="title-group">
         <h1 class="main-title">
           {{ucfirst($notice->name) }}
         </h1>
      </div>
      <div class="breadcrumbs">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Notice Details</li>
            </ol>
         </nav>
      </div>
   </div>
</section>

<section class="notice-detail-section">
   <div class="container">
      <div class="row">
      <div class="col-md-8">
         <div class="notice-detail-head">
            <h3>{{ $notice->name }}</h3>
            @if($notice->contentType == 1)
             <div class="file mt-3">
               <img src="{{$notice->content}}" alt="noimage" width=100%>
            </div>
            @else
            <div class="file mt-3">
                <iframe type="application/pdf" src="{{ $notice->content }}"></iframe>
            </div>
            @endif
         </div>
      </div>
      <div class="col-md-4 make-me-sticky">
                <div class="list-info">
                   <h3>Related Notices</h3>
                   <div class="list-line"></div>
                   <ul>
                       @forelse ($notices as $item)
                            <li><a href="{{ route('notice.detail',$item->slug) }}">{{ $item->name }}</a></li>
                       @empty

                       @endforelse


                   </ul>
               </div>
            </div>
         </div>
   </div>
</section>

@endsection
