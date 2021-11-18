@extends('dashboard.master')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Send Email To CLient</h4>
            </div>

            <div class="col-md-7 align-self-center">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                     
                    </ol>
                </div>
            </div>
        </div>

        <div class="row list-of-items">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Email</h4>
                        <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>

                        <form method="post" action="{{ route('seller.email.send') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Subject</h4>
                                    <input type="text" name = "subject" class="form-control form-control-line" value="{{old('subject')}}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Mail To</h4>
                                    <select class="form-control form-control-line" name="mailto" required>
                                        <option>--Please Select User Type--</option>
                                        <option value="seller"> Seller </option>
                                        <option value="employee"> Employee </option>
                                        <option value="user"> Client </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Message</h4>
                                <textarea name="message" id="description-ckeditor" class="ckeditor" required>
                                    {{old('message')}}
                                </textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>

            </div>
        </div>

        <div class="col-2"></div>

    </div>
@endsection
