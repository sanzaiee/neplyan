
@extends('client.master')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
              <h6 class="card-subtitle">
                </h6>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">FAQs </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row faq-section">
    <div class="col-md-10 offset-md-1">
            <div id="accordion">
               @forelse($faq as $index => $item)
                   @if($index == 0)
                       <div class="card">
                          <div class="card-header" id="heading-{{$index}}">
                             <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-{{$index}}">
                                    {!! $item->question !!}
                                </a>
                             </h5>
                          </div>
                          <div id="collapse-{{$index}}" class="collapse show" data-parent="#accordion" aria-labelledby="heading-{{$index}}">
                             <div class="card-body">
                                  {!! $item->answer !!}
    
                             </div>
                          </div>
                       </div>
                   @else
                        <div class="card">
                          <div class="card-header" id="heading-{{$index}}">
                             <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-{{$index}}">
                                    {!! $item->question !!}
                                </a>
                             </h5>
                          </div>
                          <div id="collapse-{{$index}}" class="collapse" data-parent="#accordion" aria-labelledby="heading-{{$index}}">
                             <div class="card-body">
                                  {!! $item->answer !!}
        
                             </div>
                          </div>
                       </div>
                   @endif
               @empty
               @endforelse
               
            </div>
         </div>
    </div>





</div>
@endsection
