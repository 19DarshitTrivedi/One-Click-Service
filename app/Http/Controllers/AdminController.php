<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\user;

class AdminController extends Controller
{
    function list(){
        $orders=orders::all();
        $provider=user::where(['role'=>'provider','status'=>1])->get();
        return view('admin.orderList',compact('orders','provider'));
    }
    function assignToProvider(Request $req){
        $provider_id=$req->provider_id;
        $order_id=$req->order_id;

        $data=orders::find($order_id);
        $data->provider_id=$provider_id;
        $data->save();

        $user=user::find($provider_id);
        $user->status=0;
        $user->save();
        return response()->json(["success"=>"updated"]);
    }
    function provider(){
        $provider=user::where('role','provider')->get();
        return view('admin.providerList',compact('provider'));
    }
    function user(){
        $user=user::where('role','usr')->get();
        return view('admin.userList',compact('user'));
    }
    function userStatusChange(Request $req){
        $data=$req->all();

        $users=user::find($data['id']);
        $users->status=$data['status'];
        $users->save();

        return response()->json(["success"=>$req->all()]);
    }
}
