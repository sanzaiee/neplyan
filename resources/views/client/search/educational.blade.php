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
                        {!! $item->product->description !!}
                        <div class="p-amount">
                            <span>{{ $item->product->education->name }}</span>
                            <span class="count">{{ $item->product->semester->level->material->name }}</span>
                            <span class="count">{{ $item->product->semester->level->name }}</span>
                            {{-- <span class="count">{{ $item->product->semester->name }}</span> --}}
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

    {{-- {{ $products->links() }} --}}

</div>
