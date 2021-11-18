@include('frontend.partials.header')

        <section class="banner-section">
            <div class="container">
                <div class="title-group">
                    <h1 class="main-title">
                        Teacher Details
                    </h1>
                </div>
                <div class="breadcrumbs">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teacher Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="teacher-detail-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="teacher-inner-image">
                            <img src="image/teacher1.jpg" />
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="teacher-detail-info">
                            <h2>Teacher Details</h2>
                            <h6>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.
                            </h6>
                            <ul>
                                <li>
                                    <div class="media">
                                        <i class="fa fa-map-marker"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Postal Address</h5>
                                            <p>Kathmandu, Nepal</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <i class="fa fa-envelope"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Email</h5>
                                            <p>teacher@gmail.com</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <i class="fa fa-map-marker"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Phone Number</h5>
                                            <p>+977-9841123456</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <i class="fa fa-skype"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Skype Id</h5>
                                            <p>teacher.detail</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="teacher-skill-info">
                            <h3>Mission & Biography</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="teacher-skill">
                                        <h1>My Skills</h1>
                                        <div class="skill-bar">
                                          <div class="skills" style="width: 90%;">90% Web Delopment</div>
                                      </div>

                                      <div class="skill-bar">
                                          <div class="skills" style="width: 65%;">65% Photography</div>
                                      </div>

                                      <div class="skill-bar">
                                          <div class="skills" style="width: 85%;">85% Graphics Design</div>
                                      </div>

                                      <div class="skill-bar">
                                          <div class="skills" style="width: 70%;">70% Web Design</div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-5">
                                  <div class="teacher-form">
                                    <h1>Send a Message</h1>
                                      <form>
  <div class="form-group">
    <input type="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Full Name*">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email Address*">
  </div>
  <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Message"></textarea>
  </div>

  <button type="submit">Send Message</button>
</form>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@include('frontend.partials.footer')
