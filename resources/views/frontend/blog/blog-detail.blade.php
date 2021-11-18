@extends('frontend.master')
    @php
        $url = url()->current();
    @endphp
    @section('facebookshare')
        <meta property="og:url" content="{{$url}}" />
        <meta property="og:type" content="Blog" />
        <meta property="og:title" content="Nepaliyan" />
        <meta property="og:description" content="{{$blog->name}}" />
        <meta property="og:image" content="{{$blog->image}}" />
    @endsection
@section('content')
    <section class="banner-section">
       <div class="container">
          <div class="title-group">
             <h1 class="main-title">
                {{ $blog->name }}
             </h1>
          </div>
          <div class="breadcrumbs">
             <nav>
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
             </nav>
          </div>
       </div>
    </section>
    <section class="detail-inner-page">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <div class="head-detail">
                   <a href="{{ route('blog.tag',$blog->tag_id) }}"><button class="btn btn-primary">{{ $blog->tag->name }}</button></a>
                   <h2>{{ $blog->name }}</h2>
                   <p>{{ $blog->created_at->diffForHumans() }}</p>
                   <img src="{{ $blog->image }}">
                </div>
             </div>
          </div>
          <div class="row mt-3">
             <div class="col-md-8">
                <div class="description">
                   {!! $blog->short_description !!}
                   {!! $blog->description !!}
                   <div class="content-tags">
                      <div class="row">
                         <div class="col-md-6">
                            <ul class="tags">
                               <span>Tags:</span>
                               @forelse ($tags as $item)
                               <li><a href="{{ route('blog.tag',$item->id) }}">{{ $item->name }},</a></li>
                               @empty
                               @endforelse
                            </ul>
                         </div>
                         <div class="col-md-6">
                            <ul class="social">
                               <span>Share This:</span>
                               {{--
                               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               --}}
                               <div class="addthis_inline_share_toolbox_7ecg"></div>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="col-12">
                      <div class="blog-comments">
                         <h2>{{ $comments->count() }} Comments</h2>
                         @forelse ($comments as $item)
                         <div class="comments-body">
                            <div class="single-comments">
                               <div class="main">
                                  <div class="head">
                                     <img src="{{ asset('frontend') }}/image/comments1.png" alt="#">
                                  </div>
                                  <div class="body">
                                     <div class="row">
                                        <div class="col-md-9">
                                           <h4>{{ $item->client->name }}<span class="meta">{{ $item->created_at->diffforhumans() }}</span></h4>
                                           {!! $item->comment !!}
                                        </div>
                                        @auth
                                        @if(auth()->user()->is_super_admin == 1)
                                        <div class="col-md-3">
                                           <a href="" class="btn btn-rounded btn-xs btn-danger comment-delete" data-toggle="tooltip"
                                              title="Change Feature Status"
                                              onclick="event.preventDefault(); if(confirm('Are You Sure ?')) document.getElementById('comment-feature-{{ $item->id }}').submit();">
                                           <i class="fa fa-eye"></i>
                                           </a>
                                           <form id="comment-feature-{{ $item->id }}" action="{{route('comment.feature',$item->id)}}" method="post">
                                              @csrf
                                           </form>
                                        </div>
                                        @endif
                                        @endauth
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         @empty
                         @endforelse
                      </div>
                   </div>
                   <div class="col-12">
                      <div class="comments-form">
                         <h2>Join the discussion</h2>
                         <form class="form" method="post" action="{{ route('comment.store') }}">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="form-group w-100">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comment" rows="7" placeholder="Comment"></textarea>
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="form-group">
                                     <button type="submit" class="button primary">Submit Comment</button>
                                  </div>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 make-me-sticky">
                <div class="right-sidebar-search">
                   <div class="latest-blog">
                      <h3>Latest Post</h3>
                        <div class="blog">
                            @forelse ($latest as $item)
                                <div class="single-blog">
                                    <img src="{{ $item->image ?? '' }}" alt="#">
                                    <div class="text">
                                       <p><a href="{{ route('blog.detail',$item->slug) }}">{{ $item->name }}</a> </p>
                                       <span>{{ $item->created_at->diffforhumans() }}</span>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                   </div>
                   <div class="right-tags">
                      <h3>Tags</h3>
                      <ul>
                         @forelse ($tags as $item)
                         <li><a href="{{ route('blog.tag',$item->id) }}">{{ $item->name }}</a></li>
                         @empty
                         @endforelse
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
@endsection
