
<section class="about-section">
    <div class="container">
          <div class="row">
             <div class="col-md-4">
                <div class="feature">
                   <div class="media">
                      <i class="fa fa-umbrella"></i>
                      <div class="media-body">
                         <h5 class="mt-0">{{ $guideline->title1 ?? '' }}</h5>
                        {!! $guideline->description1 ?? '' !!}
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="feature">
                   <div class="media">
                      <i class="fa fa-address-card-o"></i>
                      <div class="media-body">
                        <h5 class="mt-0">{{ $guideline->title2 ?? '' }}</h5>
                        {!! $guideline->description2 ?? '' !!}
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="feature">
                   <div class="media">
                      <i class="fa fa-handshake-o"></i>
                      <div class="media-body">
                        <h5 class="mt-0">{{ $guideline->title3 ?? '' }}</h5>
                       {!! $guideline->description3 ?? '' !!}
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>


