@include('frontend.partials.header')

<section class="banner-section">
   <div class="container">
      <div class="title-group">
         <h1 class="main-title">
            Book
         </h1>
      </div>
      <div class="breadcrumbs">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Book</li>
            </ol>
         </nav>
      </div>
   </div>
</section>
<section class="course-inner-section">
    <div class="container">
         <div class="course-menu mt-2 mb-4">
            <ul>
               <li class="btn btn-outline-primary course-btn active" data-filter="*">All</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem1">1st Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem2">2nd Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem3">3rd Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem4">4th Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem5">5th Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem6">6th Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem7">7th Semester</li>
               <li class="btn btn-outline-primary course-btn" data-filter=".sem8">8th Semester</li>
            </ul>
         </div>
         <div class="course-item row">
            <div class="item sem1 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/1.jpg">
               <div class="popular-info">
                  <h3><a href="#">English</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem2 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/2.jpg">
               <div class="popular-info">
                  <h3><a href="#">Nepali</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem3 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/3.jpg">
               <div class="popular-info">
                  <h3><a href="#">Math</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem4 col-lg-3 col-md-4 col-6 col-sm">
              <div class="popular">
               <img src="image/4.jpg">
               <div class="popular-info">
                  <h3><a href="#">Account</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem5 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/5.jpg">
               <div class="popular-info">
                  <h3><a href="#">Economics</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem6 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/1.jpg">
               <div class="popular-info">
                  <h3><a href="#">English</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem7 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/4.jpg">
               <div class="popular-info">
                  <h3><a href="#">Business Math</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>
            <div class="item sem8 col-lg-3 col-md-4 col-6 col-sm">
               <div class="popular">
               <img src="image/2.jpg">
               <div class="popular-info">
                  <h3><a href="#">Account</a></h3>
               </div>
               <div class="price">
                  <div class="student">
                     <a href="cart.php"><button>Buy Now</button></a>
                  </div>
                  <div class="fee">
                     <p><i class="fa fa-money"></i> 200</p>
                  </div>
               </div>
            </div>
            </div>

         </div>
      </div>

</section>
@include('frontend.partials.footer')
