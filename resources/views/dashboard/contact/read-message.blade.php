@extends('dashboard.master')
@section('content')
<style>
    .read-message-part {
    margin-bottom: 20px;
}
.read-message h2 {
    font-size: 19px;
    color: #003893;
}
.read-mes {
    margin-top: 20px !important;
    display: inline-flex;
}
.read-message {
    background: #fff;
    padding: 15px 25px;
    border-radius: 5px;
    margin-bottom: 25px;
}
.read-message h2 {
    font-size: 18px;
    color: #003893;
    margin-bottom: 0;
    font-weight: 500;
}
.read-message h5 {
    margin-bottom: 0;
    font-weight: 500;
}
.read-message h5 {
    line-height: 28px;
    font-weight: 400;
}
h3.title {
    font-size: 18px;
    font-weight: 400;
    color: #003893;
}
</style>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Support Message</h4>

        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                </ol>
         
            </div>
        </div>
    </div>
    <div class="row list-of-items read-mes">
        <div class="col-md-5">
            <div class="read-img">
                <img src="../frontend/image/message.svg" class="w-100">
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
            <h3 class="title">Full Name</h3>
            <div class="read-message">
                <h2>{{$item->client->name ?? $item->seller->name}}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="title">Email Address</h3>
            <div class="read-message">
                <h2>{{$item->client->email ?? $item->seller->email}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <h3 class="title">Subject</h3>
            <div class="read-message">
                <h5>{{$item->subject ?? ''}}</h5>
            </div>
        </div>
        <div class="col-md-12">
            <h3 class="title">Message</h3>
           <div class="read-message">
                <h5>{!! $item->message ?? '' !!}</h5>
            </div> 
        </div>
            </div>
        </div>
        
        
    </div>
    </div>

@endsection