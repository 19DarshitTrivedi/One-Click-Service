<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\services;
use App\Models\sub_services;
use App\Models\cart;

class ServiceController extends Controller
{
    function index(){
        return view('services.addService');
    }
    function store(Request $req){
        $data=new services();
        $data->service_name=$req->servicename;
        $data->status=$req->status;
        $data->save();

        $services=DB::table('services')->latest('id')->first();
        $services_id=$services->id;
        $sub_service_name=$req->subservicename;
        $sub_service_price=$req->subserviceprice;

        for($i=0;$i<count($sub_service_name);$i++)
        {
            DB::insert('insert into sub_services (sub_service_name,price,service_id) values (?,?,?)',[$sub_service_name[$i],$sub_service_price[$i],$services_id]);
        }
        return redirect('/services/list');
    }
    function list(){
        $sub_services=sub_services::all();
        return view('services.index',compact('sub_services'));
    }
    function edit($id){
        $services=sub_services::find($id);
        return view('services.editService',compact('services'));
    }
    function update(Request $req){
        //return $req->all();
        $id=$req->id;
        $service=sub_services::find($id);
        $service->sub_service_name=$req->subservicename;
        $service->price=$req->subserviceprice;
        $service->save();
        return redirect('/services/list');
    }
    function statusChange(Request $req){
        $id=$req->id;
        $status=$req->status;

        sub_services::where('id',$id)->update(['status' => $status]);
        return response()->json([
            'success'=> "success"
        ]);
    }
}
