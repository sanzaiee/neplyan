@extends('frontend.masterforlogin')
@section('content')

<section class="banner-section">
    <div class="container">
        <div class="title-group text-center">
            <img src="{{ $setting->image ?? '' }}" alt="" height="300px" width="300px">
            {{-- <h1 class="main-title">

                Welcome To Nepaliyan
            </h1> --}}
        </div>
        
    </div>
</section>
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login">
                    <h2>Login</h2>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required/>
                        </div>
                        <div class="form-check mb-2">
                            <a href="{{ route('password.request') }}">Did you forget password??</a>

                            <!--<input type="checkbox" class="form-check-input" id="exampleCheck1" />-->
                            <!--<label class="form-check-label" name="remember" for="exampleCheck1">Remember Me</label>-->
                        </div>
    

                        <button type="submit" class="btn btn-primary">Login</button>
                        

                    </form>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="login">
                    <h2>Create A New Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    	<div class="form-group">
                            <input type="text" class="form-control" id="name" value="{{old('name')}}" aria-describedby="name" name="name" placeholder="Enter User Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobile" aria-describedby="mobile" name="mobile" value="{{old('mobile')}}" placeholder="Enter Mobile Number" required/>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="Enter email" required/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" aria-describedby="address" placeholder="Enter Address" />
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="myInputpass1"  placeholder="Password" required/>
                            <span> <i class="fa fa-eye" onclick="myPassword1()" id="eye1"></i></span>
                        </div>

                        <div class="form-group">
                            <input type="password" name="confirm" class="form-control" id="myInputpass2" onkeyup="validateePassword()" placeholder="Confrim Password" required/>
                            <span> <i class="fa fa-eye" onclick="myPassword2()" id="eye2"></i></span>
                        </div>

                        <p>The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    //script for confirm pass and password match

    function validateePassword(){
        var password = document.getElementById("myInputpass1"),
        confirm_password = document.getElementById("myInputpass2");
        console.log(confirm_password.value);
        console.log(password.value);

    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
        confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validateePassword;
    confirm_password.onkeyup = validateePassword;

    function myPassword1() {
        var x = document.getElementById("myInputpass1");
        var y = document.getElementById("eye1")
        if (x.type === "password") {
            x.type = "text";
            y.classList.remove('fa-eye');
            y.classList.add('fa-eye-slash');

        } else {
            x.type = "password";
            y.classList.remove('fa-eye-slash');
            y.classList.add('fa-eye');
        }
    }
    function myPassword2() {
        var x = document.getElementById("myInputpass2");
        var y = document.getElementById("eye2")
        if (x.type === "password") {
            x.type = "text";
            y.classList.remove('fa-eye');
            y.classList.add('fa-eye-slash');

        } else {
            x.type = "password";
            y.classList.remove('fa-eye-slash');
            y.classList.add('fa-eye');
        }
    }
    </script>
