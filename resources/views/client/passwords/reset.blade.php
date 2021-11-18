@extends('frontend.master')

@section('content')
<style>
    .input-icon1 {
    position: relative;
}

.input-icon1 i {
    position: absolute;
    top: 10px;
    right: 0;
    right: 10px;
}

.input-icon2 i {
    position: absolute;
    right: 10px !important;
    bottom: 10px;
}

.input-icon2 {
    position: relative;
}


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>
                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('client.password.update') }}">
                        @csrf
                        <div class="form-row">

                        <div class="col-md-12 form-group">
                            <div class="input-icon1">
                            <input type="email" id="email" class="form-control" name="email" value="{{ $data['email'] }}" readonly>
                            <i class="fa fa-envelope"></i>
                            </div>
                        </div>


                            <div class="col-md-6 form-group">
                                <div class="input-icon2">
                                <input type="password" id="myInputpass1" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-eye" onclick="myPassword1()" id="eye1"></i>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-icon2">

                                <input type="password" id="myInputpass2" class="form-control" name="confirm" onkeyup="validateePassword()" placeholder="Confirm Password">
                                <i class="fa fa-eye" onclick="myPassword2()" id="eye2"></i>
                                </div>

                            </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    //script for confirm pass and password match

    function validateePassword(){
        var password = document.getElementById("myInputpass1"),
        confirm_password = document.getElementById("myInputpass2");
        console.log('sdfsd');

    if(password.value != confirm_password.value) {
        // console.log(confirm_password.value + password.value);
        confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
        // console.log(confirm_password.value);
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
