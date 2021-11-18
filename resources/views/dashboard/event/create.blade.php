@extends('dashboard.master')
@section('content')
<div class="container-fluid">

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Event<h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                <li class="breadcrumb-item active">Add Content </li>
            </ol>
            <a href="{{ route('event.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-arrow-up"></i>All Content</button></a>
        </div>
    </div>
</div>
<div class="row list-of-items">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create content</h4>
                <h6 class="card-subtitle">Please <code>Fill Up</code> all the fields.</h6>

                @if ($event)
                    <form class="m-t-40" method="post" action="{{ route('event.update',$event->id ) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
                @endif
                @csrf


                <div class="row list-of-items">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Event Name</h4>
                                    <input type="text" name = "name" class="form-control form-control-line" value="{{ $event->name ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">MapLink</h4>
                                    <input type="text" name = "maplink" class="form-control form-control-line" value="{{ $event->maplink ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image Upload</h4>
                                <label for="input-file-now">Please select your content.</label>
                                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $event->image ?? '' }}"/>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Address</h4>
                                    <input type="address" name = "address" class="form-control form-control-line" value="{{ $event->address ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                        @if($event)
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Feature Status</h4>
                                    <select name="status" id="" class="form-control form-control-line">
                                        @if ($event->status == 1)
                                            <option value="1" selected> Active</option>
                                            <option value="0">In Active</option>
                                        @elseif ($event->status == 0)
                                            <option value="1"> Active</option>
                                            <option value="0" selected>In Active</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Date</h4>
                                    <input type="date" name = "onDate" class="form-control form-control-line" value="{{ $event->onDate ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Start Time</h4>
                                    <input type="time" name = "start" class="form-control form-control-line" value="{{ $event->start ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">End Time</h4>
                                    <input type="time" name = "end" class="form-control form-control-line" value="{{ $event->end ?? '' }}" required>
                                </div>
                            </div>
                        </div>




                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Description</h4>
                                <textarea name="description" id="description-ckeditor" class="ckeditor" required>
                                    {!! $event->description ?? '' !!}
                                </textarea>
                            </div>
                        </div>
                    </div>

                </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection



