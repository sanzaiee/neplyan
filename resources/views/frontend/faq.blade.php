@extends('frontend.master')
@section('content')
<section class="banner-section">
   <div class="container">
      <div class="title-group">
         <h1 class="main-title">
            Frequently Asked Questions
         </h1>
      </div>
      <div class="breadcrumbs">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Frequently Asked Questions</li>
            </ol>
         </nav>
      </div>
   </div>
</section>
<section class="faq-section">
   <div class="container">
      <div class="row">
         <div class="col-md-10 offset-md-1">
            <div id="accordion">
                @forelse ($faqs as $index=>$item)
                @if($index==0)
                
                  <div class="card">
                        <div class="card-header" id="heading-{{$index}}">
                            <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-1">
                                    {!! $item->question !!}
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-{{$index}}" class="collapse show" data-parent="#accordion" aria-labelledby="heading-{{$index}}">
                            <div class="card-body">
                                {!! $item->answer !!}
                            </div>
                        </div>
                        </div>
                
                @else
                
                  <div class="card">
                        <div class="card-header" id="heading-{{$index}}">
                            <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-1">
                                    {!! $item->question !!}
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-{{$index}}" class="collapse" data-parent="#accordion" aria-labelledby="heading-{{$index}}">
                            <div class="card-body">
                                {!! $item->answer !!}
                            </div>
                        </div>
                        </div>
                @endif
                
                  
                @empty
                    <h5>Sorry!! No Content We Will Update Soon....</h5>
                @endforelse


            </div>
         </div>
      </div>
   </div>
</section>
@endsection
