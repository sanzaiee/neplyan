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
                        {!! $item->other_product->description !!}
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
