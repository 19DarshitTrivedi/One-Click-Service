@extends('customer.header')
    @section('content')
    <div class="text-center mt-4 mb-4" style="color: blue;">
    </div>
    <table id="product-datatable" class="table table-striped table-bordered text-center" width="100%">
        <tbody>
            <tr>
                <td>Total Amount</td>
                <td>Rs {{$price_total}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>Rs 0</td>
            </tr>
            <tr>
                <td>Delivery Fee</td>
                <td>Rs 70</td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td>Rs {{$price_total+70}}</td>
            </tr>
        </tbody>
    </table>
    <form action="{{route('place.order')}}" method="post">
        @csrf
        <div class="form-group">
            <label for=""><b>Enter Your Address :</b></label><br>
            <textarea name="address" id="" cols="155" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for=""><b>Payment Method :</b></label><br>
            <input type="radio" name="pay_method" value="Cash" checked> Cash On Delivery
        </div>
        <div class="form-group text-right">
            <input type="submit" class="btn btn-primary" value="Place Order">
        </div>
    </form>
    @endsection