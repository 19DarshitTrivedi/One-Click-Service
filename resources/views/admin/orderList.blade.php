@extends('layout.app')
@section('title','List Orders')
@section('css')
<style>
    .card-box {
        background-clip: padding-box;
        margin-bottom: 20px;
        background-color: rgb(255, 255, 255);
        padding: 20px;
        border-width: 1px;
        border-style: solid;
        border-color: rgba(54, 64, 74, 0.05);
        border-image: initial;
        border-radius: 5px;
    }
    .title{
        float:center !important;
        text-align: center !important;
    }
    .pull-right{
        float:right !important;
    }
    .dataTables_filter{
        text-align: left !important;
    }
    #btn{
        border: none !important;
    }
    #first_name,#address1,#sal,#overtime,#type,#middle_name,#salary,#address2,#city,#state,#pincode,#altphoneno,#last_name,#dob,#email,#address,#parentno,#parentaltno,#phone,#school,#parent_name,#role{
        border: none !important;
    }
    #first_name,#address1,#sal,#overtime,#type,#middle_name,#salary,#address2,#city,#state,#pincode,#last_name,#dob,#email,#address,#parentno,#parentaltno,#phone,#school,#parent_name,#role{
        width: 100%;
    }
</style>
@endsection
@section('bread-crumb')
<div class="col-sm-12">
    <h3 class="m-0 mt-3">List Orders</h3>
    <ol class="breadcrumb float-sm-left">
      <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item active">List Orders</li>
    </ol>
</div>
@endsection
@section('main-content')
    <div class="col-sm-12">
        {{-- @include('_notification') --}}
        <div class="card-box table-responsive">
            <div id="filter"></div>
            <form action="#" method="get">
            <table id="product-datatable" class="table table-striped table-bordered text-center" width="100%">
                <input type="hidden" name="coach_id" id="coaches_id">
                <thead>
                    <tr>
                        <th style="text-align: center;">Order ID</th>
                        <th style="text-align: center;">Services</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Users</th>
                        <th style="text-align: center;">User Address</th>
                        <th style="text-align: center;">Payment Method</th>
                        <th style="text-align: center;">Order Date</th>
                        <th style="text-align: center;">Order Progress</th>
                        <th style="text-align: center;">Service Provider</th>
                        <th style="text-align: center;">Assign</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->serviceNames->sub_service_name}}</td>
                        <td>{{$data->serviceNames->price}}</td>
                        <td>{{$data->userNames->name}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->payment_method}}</td>
                        <td>{{$data->order_date}}</td>
                        <td>{{$data->order_progress}}</td>
                        <td>
                            <select class="form-control" name="providers" id="provider_name">
                                <option value="" readonly>--select--</option>
                                @foreach ($provider as $providers)
                                    <option value="{{$providers->id}}">{{$providers->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><a class="orders" data-order-id={{$data->id}}>
                            <span class="btn btn-primary">Assign</span>
                        </a></td>
                    </tr>
                    @endforeach 
                </tbody>
                <input type="hidden" id="providers_id" name="servicer_name">
            </table>
            </form>
        </div>
    </div>

@section('js-content')
<script>
    $(document).ready(function(){

        $('#product-datatable').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            //"dom": '<"pull-left"f><"pull-right"l>tip',
            //"dom":'<"title"f>rtip',
            "dom":'Rfrtlp<"title"i>',
            "language":{
                "info":"Showing _TOTAL_ Entries"
            }
            });

                $(document).on('change','#provider_name',function() {
                    var provider_id=$(this).val();
                    $('#providers_id').val(provider_id);
                });

                $('a.orders').click(function(){
                    var order_id=$(this).attr('data-order-id');
                    var provider=$('#providers_id').val();
                    $.ajax({
                        url: '{{ url("/admin/assign") }}',
                        type:'get',
                        data:{provider_id:provider,order_id:order_id},
                        success:function(res){
                            console.log(res);
                            window.location.reload();
                        },
                        error:function(xhr,status,error){
                            var err=eval(xhr.responseText);
                            console.log(err);
                        }
                    });
            });   
    });
</script>
@endsection
@endsection