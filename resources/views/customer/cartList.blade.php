@extends('customer.header')
    @section('content')
    <form action="post" >
    <div class="text-center mt-4 mb-4" style="color: blue;">
        <h3>Cart Listing</h3>
    </div>
    <table id="product-datatable" class="table table-striped table-bordered text-center" width="100%">
        <input type="hidden" name="coach_id" id="coaches_id">
        <thead>
            <tr>
                <th style="text-align: center;">Service Name</th>
                <th style="text-align: center;">Price</th>
                <th data-sorting="false">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $data)
            <tr>
                {{-- <td>{{$coach["first_name"]." ".$coach["last_name"] }}</td> --}}
                <td>{{$data->sub_service_name}}</td>
                <td>{{$data->price}}</td>
                <td width="12%">
                    {{-- @if(in_array('Edit Coach',\Session::get('permissions'))) --}}
                    {{-- @endif --}}
                    {{-- @if(in_array('Delete Coach',\Session::get('permissions'))) --}}
                    <a href="{{ route('cart.delete',$data->cart_id) }}">
                        <i class="fas fa-trash text-red">&nbsp;&nbsp;</i>
                    </a>
                    {{-- @endif --}}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="text-right">
        <a href="{{route('order.list')}}" class="btn btn-primary">Order Now</a>
    </div>
    @endsection