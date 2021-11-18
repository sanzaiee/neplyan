@extends('dashboard.master')
@section('content')
<style>
.box-shadow {
    box-shadow: 0 0 57px rgb(0 0 0 / 8%);
    margin-bottom: 25px;
}
.program-box {
    /* padding: 15px; */
    border-radius: 5px;
}
.program-image img {
    /* border-radius: 5px; */
    width:100%;
    object-fit: cover;
    height: 250px;
}
.program-content {
    text-align: center;
}
.program-content h4 {
    color: #004E8B;
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 10px;
    margin-top: 10px;
    line-height: 30px;
}
.program-content h4 {
    color: #004E8B;
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 10px;
    margin-top: 10px;
    line-height: 30px;
}
.program-content a {
    color: #004E8B;
}
.program-content p {
    line-height: 24px;
    font-size: 14px;
    color: #757575;
    margin-bottom: 10px;
    overflow: hidden;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    display: -webkit-box;
}
.program-button {
    /* border-top: 1px solid #eee; */
    width: 100%;
    display: flex;
    background: #fff;
    margin-top: -2px;
}
.program-button .read {
    width: 50%;
    color: #004E8B;
    padding: 10px;
    text-align: center;

}
.program-button .donate {
    width: 50%;
    background: #004E8B;
    color: #fff;
    padding: 10px;
    text-align: center;
}
.program-button .read:hover {
    width: 50%;
    background: #004E8B;
    color: #fff;
    padding: 10px;
    text-align: center;
}
/* .program-button .donate:hover {
    width: 50%;
    color: #004E8B;
    background: #fff;
    padding: 10px;
    text-align: center;
} */

</style>

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">My Products </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="nav nav-tabs nav-fill tabforheadingandquestion" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Educational Products</a>
        {{-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Educational Products <input type="text" class="form-control" id="paidprod" placeholder="search here for educational products.."></a> --}}
        {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Other Products <input type="text" class="form-control" id="paidother" placeholder="search here for other products.."></a> --}}
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Other Products</a>
      </div>


      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div id="educational">
                <div class="row">
                    @forelse ($products as $item)
                        <div class="col-md-3">
                            <div class="box-shadow">
                            <div class="program-box">
                                <div class="program-image">
                                    <img src="{{ $item->image }}">
                                </div>
                                    <div class="program-content">
                                        <h4>{{ ucfirst($item->name) }}<br>
                                        <small>
                                            {{ $item->education->name}}/{{ $item->semester->level->material->name }}/{{ $item->semester->level->name }}/{{ $item->semester->name }}
                                        </small>
                                    </h4>
                                    </div>
                                    <div class="program-button">
                                        <a href="{{ route('read.content',$item->slug) }}" class="read donate" target="blank" data-toggle="tooltip" data-original-title="Read Content">
                                            <span>Read</span>
                                        </a>
                                        @if($item->approve == 0)
                                            <a href="{{ route('add.topic',$item->slug) }}" class="read" target="blank" data-toggle="tooltip" data-original-title="Add Content">
                                                <span> <i class="fa fa-plus"></i> Add Content</span>
                                            </a>
                                        @endif
                                    </div>
                            </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div id="otherss">
                <div class="row">
                @forelse ($other_products as $item)
                    <div class="col-md-3">
                        <div class="box-shadow">
                        <div class="program-box">
                            <div class="program-image">
                                <img src="{{ $item->image }}">
                            </div>
                                <div class="program-content">
                                    {{-- <h4><a href="project-details.php">{{ ucfirst($item->name) }}</a></h4> --}}
                                    <h4>{{ ucfirst($item->name) }}</h4>
                                    <p> Category: {{ $item->other->name }}</p>

                                </div>
                                <div class="program-button">
                                    <a href="{{ route('read.otherproduct',$item->slug) }}" class="read donate" target="blank" data-toggle="tooltip" data-original-title="Read Content">
                                        <span>Read</span>
                                    </a>
                                    @if($item->approve == 0)
                                        <a href="{{ route('add.other.topic',$item->slug) }}" class="read" target="blank" data-toggle="tooltip" data-original-title="Add Content">
                                            <span> <i class="fa fa-plus"></i> Add Content</span>
                                        </a>
                                    @endif
                                </div>
                        </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
            </div>
        </div>






 </div>
 @endsection
 {{-- @section('prod-search')
 <script>
     $('#paidprod').on('keyup',function(){
         let id =$(this).val();
         // console.log(id);
             $.ajax({
                 type:'POST',
                 url:'/search/paid-product/',
                 data:{
                     "_token": "{{ csrf_token() }}",
                     name : id
                 },
                 success:function(response){
                     // var response = JSON.parse(response);
                     // console.log(response);
                     $('#educational').html(response);
                 }
             });

         });
 </script>

 <script>
     $('#paidother').on('keyup',function(){
         let id =$(this).val();
         // console.log(id);
             $.ajax({
                 type:'POST',
                 url:'/search/paid-other-product',
                 data:{
                     "_token": "{{ csrf_token() }}",
                     name : id
                 },
                 success:function(response){
                     // var response = JSON.parse(response);
                     // console.log(response);
                     $('#otherss').html(response);
                 }
             });

         });
 </script>
@endsection --}}
