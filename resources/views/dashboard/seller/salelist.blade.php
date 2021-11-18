@extends('dashboard.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">Products </h4>
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
       
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Other Products</a>
    </div>
      
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
            <div class="row list-of-items">
                <div class="table-responsive m-t-40">
                  <table id="myTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Image</th>
                           <th scope="col">Product Name</th>
                           <!--<th scope="col">Amount</th>-->
                           <th scope="col">Total Sales</th>
                           {{-- <th scope="col">Status</th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($totalSales as $index=>$item)
                        <tr>
                           @php $product = App\Product::find($index); @endphp
                                                

                           <td><img src="{{ $product['image']}}" alt="" heightp="100px" width="100px"></td>
                           <td>{{ $product['name'] }}</td>
                           <!--<td>{{ $product->amount }}</td>-->
                           <td>{{ $item }}</td>
                         
                        </tr>
                        @empty
                            <h1>Content not updated yet...</h1>
                        @endforelse
                 </tbody>
                </table>
           </div>
        </div>
    </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row list-of-items">
          <div class="table-responsive m-t-40">
                  <table id="myOtherTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <!--<th scope="col">S/N</th>-->
                           <th scope="col">Image</th>
                           <th scope="col">Product Name</th>
                           <!--<th scope="col">Amount</th>-->
                           <th scope="col">Total Sales</th>
                           {{-- <th scope="col">Status</th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($totalSalesOther as $index=>$item)
                        <tr>
                                                      @php $product = App\OtherProduct::find($index); @endphp

                           <!--<td>{{ ++$index }}</td>-->
                           <td><img src="{{ $product['image']}}" alt="" heightp="100px" width="100px"></td>
                           <td>{{ $product['name'] }}</td>
                           <!--<td>{{ $product->amount }}</td>-->
                           <td>{{ $item }}</td>
                        

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
@endsection
