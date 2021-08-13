<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\orders;
use Session;

class ServiceProviderController extends Controller
{
    function index(){
        $provider_id=Session::get('provider')['id'];
        $order=orders::where(['provider_id'=>$provider_id,'order_progress'=>'pending'])->first();

        return view('provider.index',compact('order'));
    }
    function save(Request $req){
        //return $req->all();
        $user=new user();
        $user->name=$req->name;
        $user->phone=$req->phone;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->address=$req->address;
        $user->city=$req->city;
        $user->state=$req->state;
        $user->pin_code=$req->pin_code;
        $user->role='provider';
        $user->specialization=$req->specialization;
        $user->save();
        return redirect('/loginIndex');
    }
    function completeOrder($id){
        $order_id=$id;
        $orders=orders::find($order_id);
        $orders->order_progress='Completed';
        $orders->save();
        return redirect('/provider/index');
    }
}
