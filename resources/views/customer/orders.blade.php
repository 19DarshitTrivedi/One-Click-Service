@extends('customer.header')
    @section('content')
    <form action="post" >
    <div class="text-center mt-4 mb-4" style="color: blue;">
        <h3>Your Orders</h3>
    </div>
    <table id="product-datatable" class="table table-striped table-bordered text-center" width="100%">
        <input type="hidden" name="coach_id" id="coaches_id">
        <thead>
            <tr>
                <th style="text-align: center;">Service Name</th>
                <th style="text-align: center;">Price</th>
                <th style="text-align: center;">Order Progress</th>
                <th style="text-align: center;">Order Date</th>
                <th style="text-align: center;">Payment Method</th>
                <th style="text-align: center;">Cancel Orders</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                {{-- <td>{{$coach["first_name"]." ".$coach["last_name"] }}</td> --}}
                <td>{{$data->sub_service_name}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->order_progress}}</td>
                <td>{{$data->order_date}}</td>
                <td>{{$data->payment_method}}</td>
                <td>
                    <a href="{{ route('cancel.order',$data->id) }}" class="btn btn-danger">
                        Cancel Order
                    </a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    @endsection