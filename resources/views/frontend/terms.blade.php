@extends('frontend.master')
@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="title-group">
                <h1 class="main-title">
                    Terms & Conditions
                </h1>
            </div>
            <div class="breadcrumbs">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ucfirst($term->title) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="terms-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="terms-info">
                        {!! $term->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

