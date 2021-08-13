@extends('provider.header')
@section('content')
<div class="text-center mt-4 mb-4" style="color: blue;">
    <h3>Assign Order</h3>
</div>
@if ($order==null)
    <h1>No record Found</h1>
@else
<div class="card text-black border-primary m-3">
    <div class="card-header"><b>Customer Name :</b> {{$order->userNames->name}}
        
    </div>
    <div class="card-body">
        <h6 class="card-title text-mmuted"><b>Address : {{$order->address}}</b></h6>
      <h6 class="card-title text-mmuted">Service : {{$order->serviceNames->sub_service_name}}</h6>
      <h6 class="card-title text-mmuted">Price : {{$order->serviceNames->price}}</h6>
      <h6 class="card-title text-mmuted">Payment : {{$order->payment_method}}</h6>
      <h6 class="card-title text-mmuted">Order Date : {{$order->order_date}}</h6>
      <a href="{{route('complete.order',$order->id)}}" class="btn btn-primary">Complete Order</a>
    </div>
</div>
@endif
@endsection

@section('js_content')
@endsection
</body>
</html>