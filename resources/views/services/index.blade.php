@extends('layout.app')
@section('title','List Services')
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
    <h3 class="m-0 mt-3">List Services</h3>
    <ol class="breadcrumb float-sm-left">
      <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item active">List Services</li>
    </ol>
</div>
@endsection
@section('main-content')
    <div class="col-sm-12">
        {{-- @include('_notification') --}}
        <div class="card-box table-responsive">
            <div class="row mb-3">
                <div class="col-sm-12 text-right">
                    {{-- @if(in_array('Create Coach',\Session::get('permissions'))) --}}
                        <a href="{{ route('service.create') }}" role="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Service </a>
                    {{-- @endif  --}}
                </div>
            </div>
            <div id="filter"></div>
            <table id="product-datatable" class="table table-striped table-bordered text-center" width="100%">
                <input type="hidden" name="coach_id" id="coaches_id">
                <thead>
                    <tr>
                        <th style="text-align: center;">Service Name</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Status</th>
                        <th data-sorting="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub_services as $data)
                    <tr>
                        {{-- <td>{{$coach["first_name"]." ".$coach["last_name"] }}</td> --}}
                        <td>{{$data["sub_service_name"]}}</td>
                        <td>{{$data["price"]}}</td>
                        <td>
                            {{$data->serviceName->service_name}}
                        </td>
                        <td>
                            {{-- <input  type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="sm" checked> --}}
                            <input data-id="{{$data['id']}}" class="chkToggle1" name="status_toggle[]" type="checkbox"  data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="outline-primary" data-offstyle="outline-secondary" {{$data['status']?'checked':''}}>
                        </td>
                        <td width="12%">
                            {{-- @if(in_array('Edit Coach',\Session::get('permissions'))) --}}
                            <a href="{{ route('service.edit',$data['id']) }}">
                                <i class="fas fa-edit">&nbsp;&nbsp;</i>
                            </a>
                            {{-- @endif --}}
                            {{-- @if(in_array('Delete Coach',\Session::get('permissions'))) --}}
                            <a href="{{ route('service.delete',$data['id']) }}">
                                <i class="fas fa-trash text-red">&nbsp;&nbsp;</i>
                            </a>
                            {{-- @endif --}}
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

        $('.chkToggle1').bootstrapToggle();

        $(function(){
            $('.chkToggle1').change(function(){
                var sub_status=$(this).prop('checked')==true?1:0;
                var sub_id=$(this).data('id');
                
                $.ajax({
                type: 'POST',
                url: '{{url("services/status")}}',
                data: {id:sub_id,status:sub_status,'_token':'{{csrf_token()}}'},
                success:function(res){
                    console.log(res.success);
                },
                error:function(xhr,status,error){
                        var err=eval(xhr.responseText);
                        console.log(err);
                }});
            });
        });

        $('#product-datatable').DataTable({
            initComplete: function () {
            this.api().columns([3,4]).every( function (d) {
                var column = this;
                var theadname = $("#product-datatable th").eq([d]).text();
                var select = $('<select class="form-control pull-right" style="width:10rem;margin-left:2rem;margin-bottom:1.5rem;"><option value=""> All '+theadname+'</option></select>')
                    .appendTo('#filter')
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                    });
                });
                $('.dataTables_filter input[type="search"]').css({'width':'25rem'});
                $('.dataTables').addClass('pull-right');
            },
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
    });
</script>
@endsection
@endsection