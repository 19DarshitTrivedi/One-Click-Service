@extends('layout.app')
@section('title','Edit Services')

@section('css')

<style>
    .card-box {
        background-clip: padding-box;
        margin: 8px;
        background-color: rgb(255, 255, 255);
        padding: 20px;
        border-width: 1px;
        border-style: solid;
        border-color: rgba(54, 64, 74, 0.05);
        border-image: initial;
        border-radius: 5px;
    }
</style>
@endsection
@section('bread-crumb')
<div class="col-sm-12">
    <h3 class="m-0 mt-3 text-muted">Edit Service</h3>
    <ol class="breadcrumb float-sm-left">
      <li class="breadcrumb-item"><a href="{{route('service.list')}}">Services</a></li>
      <li class="breadcrumb-item active">Edit Service</li>
    </ol>
</div>
@endsection
@section('main-content')
<form action="{{route('service.update')}}" method="post">
    @csrf

{{-- Status --}}
<div class="col-lg-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="text-muted">Status <span class="text-red">*</span></label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input value="1" class="custom-control-input" type="radio" id="active" name="status" required checked>
                    <label for="active" class="custom-control-label">Active</label>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input value="0" class="custom-control-input" type="radio" id="Inactive" name="status">
                    <label for="Inactive" class="custom-control-label">Inactive</label>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card-box">
        <h6 class="text-muted text-uppercase m-t-0 m-b-20">General Information</h6>
        <div class="row mt-3">
            <div class="col-sm-3">
                <div class="form-group mb-20">
                    <label class="text-muted mt-1">Sevice Name <span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <input readonly type="text" class="form-control" placeholder="e.g : Cleaning" value="{{$services->serviceName->service_name}}" name="servicename" required>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card-box">
        <div class="col-lg-12 mt-3">
            <h6 class="text-muted text-uppercase m-t-0 m-b-20">Update Sub-Services</h6>
            <table class="table mt-3" id="adding_subservices">
                <thead>
                    <tr>
                        <th>Sub Service Name</th>
                        <th>Sub Service Price</th>
                    </tr>
                </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="{{$services->id}}">
                        <input type="text" class="form-control" placeholder="e.g : Cleaning" value="{{$services->sub_service_name}}" name="subservicename" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="e.g : 500" value="{{$services->price}}" name="subserviceprice" required>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    <button type="submit" class="btn btn-success ml-3" style="min-width: 7rem;">SAVE</button>
</div>
</form>
@section('js-content')
<script>
    $(document).ready(function(){
        var x=2;
        $('#sub_service_add').click(function(){
            x++;
            var html='<tr><td><input type="text" class="form-control" placeholder="e.g : Cleaning" name="subservicename[]" required></td><td><input type="text" class="form-control" placeholder="e.g : 500" name="subserviceprice[]" required></td><td><button class="btn btn-danger" id="sub_service_delete">DELETE</button></td></tr>';
            $('#adding_subservices').append(html);
        });

        $('#customSwitch1').change(function(){
                var value = $(this).is(':checked');
                if(value){
                    toggle.push("true");
                }
                else{
                    toggle.push("false");
                }
        });

        $("#adding_subservices").on('click','#sub_service_delete',function(){
            $(this).closest('tr').remove();
        });
    });
</script>
@endsection
@endsection