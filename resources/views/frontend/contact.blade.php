@extends('frontend.master')
@section('content')

        <section class="contact-inner-section">
            <div class="map">
                {!! $setting->maplink !!}
                
            </div>
            <div class="contact-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-inner-info">
                                <div class="media">
                                    <i class="fa fa-envelope-o"></i>
                                    <div class="media-body">
                                        <h5>Tel: +977-{{$setting->mobile ?? ''}}</h5>
                                        <h5>E-Mail: <a href="">{{$setting->email ?? ''}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-inner-info">
                                <div class="media">
                                    <i class="fa fa-map-marker"></i>
                                    <div class="media-body">
                                        <h5>{{$setting->location ?? ''}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-inner-info">
                                <div class="media">
                                    <i class="fa fa-clock-o"></i>
                                    <div class="media-body">
                                        <h5>Our office is open:</h5>
                                        <h5>{{$setting->opening ?? ''}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="contact-form-info">
                                <h5>Get in Touch</h5>
                                <p>Someone finds it difficult to understand your creative idea? There is a better visualisation. Share your views with us, we’re looking forward to hear from you.</p>
                                <form action="{{ route('contact.store') }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Full Name (Required)</label>
                                            <input type="text" class="form-control" name="fullname" id="name" placeholder="Enter Full Name" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email (Required)</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject" aria-describedby="emailHelp" placeholder="Enter Subject" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                    </div>
                                        @if(config('services.recaptcha.key'))
                                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
                                        </div><br>
                                        @endif

                                    <button type="submit" onclick="if(grecaptcha.getResponse().length == 0)event.preventDefault();">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
