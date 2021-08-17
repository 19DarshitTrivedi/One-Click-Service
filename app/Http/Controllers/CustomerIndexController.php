<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services;
use App\Models\sub_services;
use App\Models\cart;
use App\Models\orders;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class CustomerIndexController extends Controller
{
    function index(){
        $data=services::all();
        return view('customer.app',compact('data'));
    }
    function listService($id){
        $service_id=services::where('id',$id)->pluck('id');
        $data=sub_services::where('service_id',$service_id)->get();
        return view('customer.sub_services',compact('data'));
    }
    function cart(Request $req){
        if($req->session()->has('user')){
            $sub_id=$req->sub_id;
            $service_id=$req->services_id;
            $user_id=$req->session()->get('user')['id'];

            $cart=new cart();
            $cart->service_id=$service_id;
            $cart->sub_service_id=$sub_id[0];
            $cart->user_id=$user_id;
            $cart->save();
            return response()->json(["success"=>"cart inserted"]);
        }
        else{
            return redirect('/loginIndex');
        }
    }
    static function cartItem(){
        $user_id=Session::get('user')['id'];
        return cart::where('user_id',$user_id)->count();
    }
    function cartList(Request $req){
        if($req->session()->has('user')){
            $user_id=Session::get('user')['id'];
            $product=DB::table('cart')->join('sub_services','cart.sub_service_id','=','sub_services.id')
            ->where('cart.user_id',$user_id)->select('sub_services.*','cart.id as cart_id')->get();
            return view('customer.cartList',compact('product'));
        }
        else{
            return redirect('/loginIndex');
        }
    }
    function orderList(){
        $user_id=Session::get('user')['id'];
        $price_total=DB::table('cart')->join('sub_services','cart.sub_service_id','=','sub_services.id')
        ->where('cart.user_id',$user_id)->select('sub_services.*','cart.id as cart_id')->sum('sub_services.price');
        return view('customer.orderList',compact('price_total'));
    }
    function cartDelete($id){
        $cart_id=$id;
        $cart=cart::find($cart_id);
        $cart->delete();
        return redirect('/cartList');
    }
    function orderPlace(Request $req){
        $user_id=Session::get('user')['id'];
        $all_carts=cart::where('user_id',$user_id)->get();
        $date = Carbon::now();
        $date->toDateTimeString();
        foreach ($all_carts as $key => $value) {
            $orders=new orders();
            $orders->sub_service_id=$value['sub_service_id'];
            $orders->user_id=$value['user_id'];
            $orders->order_progress='pending';
            $orders->payment_method=$req->pay_method;
            $orders->address=$req->address;
            $orders->order_date=$date;
            $orders->save();
            cart::where('user_id',$user_id)->delete();
        }
        return redirect('/');
    }
    function orders(Request $req){
        if($req->session()->has('user')){
        $user_id=Session::get('user')['id'];
        $data=DB::table('orders')->join('sub_services','orders.sub_service_id','=','sub_services.id')
        ->where('orders.user_id',$user_id)->select('sub_services.*','orders.*')->get();
        return view('customer.orders',compact('data'));
        }
        else{
            return redirect('/loginIndex');   
        }
    }
    function cancelOrder($id){
        $order_id=$id;
        $data=orders::find($order_id);
        $data->delete();
        return redirect('/givenOrders');
    }
}
