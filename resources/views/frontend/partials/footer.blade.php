<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
             <div class="footer-abt">
                <img src="{{ $setting->image }}">
                <p>{!! $setting->footer !!}</p>
                <div class="contact-footer">
                   <ul>
                      <li><a href="#"><i class="fa fa-map-marker"><span>{{ $setting->location }}</span></i></a></li>
                      <li><a href="tel:{{ $setting->phone }}"><i class="fa fa-phone"><span>{{ $setting->phone }}</span></i></a><span class="comma text-white"> , </span><a href="tel:{{ $setting->mobile }}">{{ $setting->mobile }}</a></li>
                      <li><a href="mailto:info@onlinestore.com"><i class="fa fa-envelope"><span>{{ $setting->email }}</span></i></a></li>
                   </ul>
                </div>
                <div class="footer-social-icon">
                   <ul>
                      <li><a href="{{$setting->facebook ?? '#'}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="{{$setting->twitter ?? '#'}}"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="{{$setting->instagram ?? '#'}}"><i class="fa fa-instagram"></i></a></li>
                      <!--<li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
                      <!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                      <li><a href="{{$setting->tiktok ?? '#'}}"><img src="../frontend/image/tik.png"></a></li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="footer-link">
                <h3>Quick Links</h3>
                <ul>
                   <li><a href="/">Home</a></li>
                   <li><a href="{{ route('about') }}">About Us</a></li>
                   <li><a href="{{ route('term') }}">Terms & Conditions</a></li>
                   <li><a href="{{ route('event') }}">Events</a></li>
                   <li><a href="{{ route('blog') }}">Blog</a></li>
                   <li><a href="{{ route('faq') }}">FAQ</a></li>
                   <li><a href="{{ route('notice') }}">Notice</a></li>
                   <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                </ul>
             </div>
          </div>
          <div class="col-md-4">
             <div class="newsletter">
                <h3>Newsletter</h3>
                <p>Subscribe Our Newsletter to Get More Update and Join Our Course Information</p>

                <div class="input-group mb-3 mt-4">
                    <form id="subscribe-form" action="{{route('subscribe.store')}}" method="post">
                        @csrf
                        <input type="email" class="form-control" name="email" placeholder="enter email" required>
                        
                        <!--<input type="text" class="form-control" name="email" value=" @if(Auth::guard('client')->check()) {{Auth::guard('client')->user()->email }}@elseif(Auth::check()) {{auth::user()->email}} @endif " readonly>-->
                    </form>     

                   <div class="input-group-append">
                      <button class="btn btn-outline-secondary"
                      onclick="event.preventDefault(); if(confirm('Do You Want To Subscribe ?')) document.getElementById('subscribe-form').submit();">Subscribe</button>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>
 </footer>
