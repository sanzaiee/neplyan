@extends('frontend.master')
@section('content')

        <section class="banner-section">
            <div class="container">
                <div class="title-group">
                    <h1 class="main-title">
                        About Us
                    </h1>
                </div>
                <div class="breadcrumbs">
                 <nav>
                   <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                 </ol>
              </nav>
           </div>
        </div>
     </section>
     <section class="about-inner-section">
      <div class="container d-flex">
             <div class="row">
                <div class="col-md-12 col-lg-4">
                   <div class="abt-image">
                      <img src="{{ $about->image ?? '' }}">
                   </div>
                </div>
                <div class="col-lg-7 col-md-12 align-self-center">
                   <div class="abt-inner-info">
                      <h4>{{ $about->title ?? ''}}</h4>
                      {!! $about->short_description ?? ''!!}
                      {!! $about->description ?? '' !!}

                   </div>
                </div>
             </div>
            </div>
        </section>

        <!--@include('frontend.partials.about-section')-->

        <section class="new-testimonal-section">
   <div class="container">
      <div class="topic">
         <div class="heading pull-left">
            {{-- <h4>Review</h4> --}}
            <h2>Testimonal</h2>
         </div>
         {{-- <div class="all-course pull-right">
            <a href="course.php"><button>View All Review</button></a>
         </div> --}}
      </div>
      <div class="row">
         <div class="owl-carousel client-slide owl-theme">
            @forelse ($testimonals as $item)
            <div class="card p-4">
                <div class="media">
                <img class="card-img-top img-fluid img-client" src="{{ $item->image }}" alt="Card image cap">
                <div class="media-body ml-3">
                    <h5 class="mt-2">{{ $item->name }}</h5>
                    <p>{{ $item->post }}</p>
                </div>
                </div>
                <div class="card-body client-body">
                <p>{!! $item->message !!}</p>
                </div>
            </div>
         @empty

         @endforelse

            {{-- <div class="card p-4">
               <div class="media">
                  <img class="card-img-top img-fluid img-client" src="{{ asset('frontend') }}/image/testimonal/2.jpg" alt="Card image cap">
                  <div class="media-body ml-3">
                     <h5 class="mt-2">Charlie Harrington</h5>
                     <p>Founder of Company</p>
                  </div>
               </div>
               <div class="card-body client-body">
                  <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
               </div>
            </div>
            <div class="card p-4">
               <div class="media">
                  <img class="card-img-top img-fluid img-client" src="{{ asset('frontend') }}/image/testimonal/3.jpg" alt="Card image cap">
                  <div class="media-body ml-3">
                     <h5 class="mt-2">Kody Byrd</h5>
                     <p>Founder of Company</p>
                  </div>
               </div>
               <div class="card-body client-body">
                  <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
               </div>
            </div>
            <div class="card p-4">
               <div class="media">
                  <img class="card-img-top img-fluid img-client" src="{{ asset('frontend') }}/image/testimonal/4.jpg" alt="Card image cap">
                  <div class="media-body ml-3">
                     <h5 class="mt-2">Lee Cunningham</h5>
                     <p>Founder of Company</p>
                  </div>
               </div>
               <div class="card-body client-body">
                  <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
</section>
        {{-- <section class="partner-section">
           <div class="container">
            <div class="topic">
               <div class="heading pull-left">
                  <h4>Partner</h4>
                  <h2>Our Partners</h2>
               </div>
            </div>
              <div class="partner">
                 <ul>
                    <li><a href="#"><img src="{{ asset('frontend') }}/image/client/c1.png"></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/image/client/c2.png"></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/image/client/c3.png"></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/image/client/c4.png"></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/image/client/c5.png"></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/image/client/c6.png"></a></li>
                 </ul>
              </div>
           </div>
        </section> --}}
    @endsection


