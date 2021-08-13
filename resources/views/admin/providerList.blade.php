@extends('layout.app')
@section('title','List Service Provider')
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
    <h3 class="m-0 mt-3">List Service Provider</h3>
    <ol class="breadcrumb float-sm-left">
      <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item active">List Service Provider</li>
    </ol>
</div>
@endsection
@section('main-content')
    <div class="col-sm-12">
        {{-- @include('_notification') --}}
        <div class="card-box table-responsive">
            <div id="filter"></div>
            <table id="product-datatable" class="table table-striped table-bordered text-center" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Phone No</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">City</th>
                        <th style="text-align: center;">State</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($provider as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->city}}</td>
                        <td>{{$data->state}}</td>
                        <td>
                            {{-- <input  type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="sm" checked> --}}
                            <input data-id="{{$data->id}}" class="chkToggle1" name="status_toggle[]" type="checkbox"  data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="outline-primary" data-offstyle="outline-secondary" {{$data->status?'checked':''}}>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
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

            $('.chkToggle1').bootstrapToggle();

            $(function(){
                $('.chkToggle1').change(function(){
                    var sub_status=$(this).prop('checked')==true?1:0;
                    var user_id=$(this).data('id');
                    
                    $.ajax({
                    type: 'get',
                    url: '{{url("user/status")}}',
                    data: {id:user_id,status:sub_status},
                    success:function(res){
                        console.log(res.success);
                    },
                    error:function(xhr,status,error){
                            var err=eval(xhr.responseText);
                            console.log(err);
                    }});
                });
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