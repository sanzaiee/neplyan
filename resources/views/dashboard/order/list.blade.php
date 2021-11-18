@extends('dashboard.master')
@section('content')
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Orders List</h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard',Auth::user()->name) }}">Home</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row list-of-items">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order List</h4>
                
                <div class="table-responsive m-t-40">
                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Order Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actual Amount</th>

                                <th scope="col">Discount Amount</th>
                                <th scope="col">Product List</th>
                                <th scope="col">Seller Name</th>
                                <th scope="col">PayMode</th>
                                <th scope="col">Order At</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($order as $index=>$item)
                               <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $item->pid }}</td>
                                    <td>{{ $item->client->name }}</td>
                                    <td>{{ $item->client->email }}</td>
                                    <td>{{ $item->client->mobile }}</td>
                                  
                                    <td> @if($item->product_id)
                                            {{$item->product->price}}
                                        @else
                                            {{$item->other_product->price}}

                                        @endif</td>
                                        
                                          <td>{{ $item->amount }}</td>


                                    <td>
                                        @if($item->product_id)
                                            {{$item->product->name}}
                                        @else
                                            {{$item->other_product->name}}

                                        @endif
                                            
                                        <!--<a href="{{ route('subscribe.courselist',$item->client->id) }}" class="btn btn-rounded btn-xs btn-info m-r-5" target="blank"> <i class="fa fa-eye"></i></a>-->
                                    </td>
                                    
                                    <td>
                                         @if($item->seller_id)
                                            {{$item->seller->name}}
                                        @else
                                            no discount

                                        @endif
                                    </td>
                                    @if($item->paymode == 1)
                                        <td>Esewa</td>

                                    @else
                                        <td>Khalti</td>
                                    @endif
                                    <td>{{$item->created_at->format('Y-m-d')}}</td>
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

@endsection





