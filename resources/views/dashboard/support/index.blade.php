@extends('dashboard.master')
@section('content')


<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"> Support List </h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
                {{-- <li class="breadcrumb-item active">All Content </li> --}}
            </ol>
            {{-- <a href="{{ route('tag.create') }}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                class="fa fa-plus-circle"></i> Add Content</button> </a> --}}
        </div>
    </div>
</div>

<div class="row list-of-items">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">
                    @include('message')
                    
                <div class="nav nav-tabs nav-fill tabforheadingandquestion" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Client Messages</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Seller Messages</a>

                </div>



                </h6>
                
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                       <tr>
                                          <th scope="col">S/N</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Mobile Number</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($clients as $index=>$item)
                                           <tr>
                                            <td>{{ ++$index }}</td>
                                               <td>{{ $item->client->name }}
                                                </td>
                                               
                                               <td>
                                                <a href="mailto:{{ $item->client->email }}"><span class="badge badge-info m-r-5 m-b-5">{{ $item->client->email }}</span></a>
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $item->client->mobile }}"><span class="badge badge-info m-r-5 m-b-5">{{ $item->client->mobile }}</span></a>
                                                    </td>
                                               <td>{{ $item->client->address }}</td>
    
                                          
                                                <td>
                                                    @if($item->status == 0)
                                                        <a href="{{route('support.read.status',$item->id)}}">
                                                            <span class="badge badge-danger m-r-5 m-b-5">unread</span>
                                                        </a>
                                                    @else
                                                       <a href="{{route('support.read.status',$item->id)}}">
                                                            <span class="badge badge-success m-r-5 m-b-5">read</span>
                                                        </a>
                                                    @endif
                                                    
                                                    
                                                  <a href="{{ route('private.create',["client",$item->client->id]) }}" data-toggle="tooltip" data-original-title="Send Message" target="_blank">
                                                    <span class="badge badge-info m-r-5 m-b-5"><i class="fa fa-enveloper"></i>Send</i></span>
    
                                                    </a>
                                                </td>
    
    
    
                                           </tr>
                                       @empty
                                           <h1>Content not updated yet...</h1>
                                       @endforelse
    
                                    </tbody>
                                 </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                 <div class="table-responsive m-t-40">
                        <table id="myOtherTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                       <tr>
                                          <th scope="col">S/N</th>
                                          <th scope="col">Name</th>
                                         
                                          <th scope="col">Email</th>
                                          <th scope="col">Mobile Number</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($sellers as $index=>$item)
                                           <tr>
                                            <td>{{ ++$index }}</td>
                                               <td>{{ $item->seller->name }}
                                                </td>
                                               
                                               <td>
                                                <a href="mailto:{{ $item->seller->email }}"><span class="badge badge-info m-r-5 m-b-5">{{ $item->seller->email }}</span></a>
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $item->seller->mobile }}"><span class="badge badge-info m-r-5 m-b-5">{{ $item->seller->mobile }}</span></a>
                                                    </td>
                                               <td>{{ $item->seller->address }}</td>
    
                                              
                                                  <td>
                                                    @if($item->status == 0)
                                                        <a href="{{route('support.read.status',$item->id)}}">
                                                            <span class="badge badge-danger m-r-5 m-b-5">unread</span>
                                                        </a>
                                                    @else
                                                      <a href="{{route('support.read.status',$item->id)}}">
                                                            <span class="badge badge-success m-r-5 m-b-5">read</span>
                                                        </a>
                                                    @endif
                                                    
                                                    
                                                    <a href="{{ route('private.create',["admin",$item->seller->id]) }}" data-toggle="tooltip" data-original-title="Send Message" target="_blank">
                                                    <span class="badge badge-info m-r-5 m-b-5"><i class="fa fa-enveloper"></i>Send</i></span>
    
                                                    </a>
                                                </td>
    
    
                                           </tr>
                                       @empty
                                           <h1>Content not updated yet...</h1>
                                       @endforelse
    
                                    </tbody>
                                 </table>
                    </div>
                </div>
                
                
                
            
            
            </div>
                
            </div>
        </div>
    </div>
</div>






</div>

@endsection




@section('employee-status')
<script>
    $('.empstatus').on('click',function(e){
        // e.preventDefault();
        console.log('heere');

        if(confirm('Are You Sure ?')){
        let data ={
            id:  $(this).data('id')
        };
        // console.log(data);
        // return false;
        axios.post('{{ route('user.status.change') }}',data).then(res=>{
            console.log(res.data);
        });

        }else{
            e.preventDefault();
        }
    });
</script>

@endsection


