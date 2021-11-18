
@extends('client.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Paid Products</h4>
              <h6 class="card-subtitle">
                </h6>
        </div>
        <div class="col-md-7 align-self-center text-right">
           
        </div>
    </div>


    <div class="nav nav-tabs nav-fill tabforheadingandquestion" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Educational Products <input type="text" class="form-control" id="paidprod" placeholder="search here for educational products.."></a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Other Products <input type="text" class="form-control" id="paidother" placeholder="search here for other products.."></a>
      </div>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div id="educational">
            <div class="row">
                @forelse ($products as $item)
                    <div class="col-md-3 wow fadeIn mb-2" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                        <div class="list__categories">
                            <div class="thumb__catrgories">
                                <a href="#">
                                    <img src="{{ $item->product->image}}" alt="post images">
                                </a>
                            </div>
                            <div class="desc__categories">
                                <div class="categories__content">
                                    <h6><a href="#">{{ $item->product->name}}</a></h6>
                                    <div class="p-amount">
                                        <span>{{ $item->product->education->name }}</span>
                                        <span class="count">{{ $item->product->semester->level->material->name }}</span>
                                        <span class="count">{{ $item->product->semester->level->name }}</span>
                                        <span class="count">{{ $item->product->semester->name }}</span>
                                        {{-- <span class="count">{{ $item->product->name }}</span> --}}
                                    </div>
                                    <div class="cat__btn">
                                        <a class="shopbtn" href="{{ route('read.content.client',$item->product->slug) }}" target="_blank">Read</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-popular-info text-center">
                            <h4>{{ucfirst($item->product->name)}}</h4>
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
                    <div class="col-md-3 wow fadeIn mb-2" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                        <div class="list__categories">
                            <div class="thumb__catrgories">
                                <a href="#">
                                    <img src="{{ $item->other_product->image}}" alt="post images">
                                </a>
                            </div>
                            <div class="desc__categories">
                                <div class="categories__content">
                                    <h6><a href="#">{{ $item->other_product->name}}</a></h6>
                                    <div class="p-amount">
                                        <span>{{ $item->other_product->other->name }}</span>
                                        {{--  <span class="count">Per Night</span>  --}}
                                    </div>
                                    <div class="cat__btn">
                                        <a class="shopbtn" href="{{ route('read.content.client',$item->other_product->slug) }}" target="_blank">Read</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-popular-info text-center">
                            <h3>{{ $item->other_product->name}}</h3>
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


@section('prod-search')
    <script>
        $('#paidprod').on('keyup',function(){
            let id =$(this).val();
            // console.log(id);
                $.ajax({
                    type:'POST',
                    url:'{{route('paid.prod.search')}}',
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
@endsection


