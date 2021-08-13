    @extends('customer.header')
    @section('content')
    <form action="post" >
    <div class="text-center mt-4 mb-4" style="color: blue;">
        <h3>SERVICES</h3>
    </div>
    @foreach ($data as $data)
    <div class="card text-black border-primary m-3">
        <div class="card-header"><b>
          {{$data['sub_service_name']}}</b>
        </div>
        <input type="hidden" name="service_id" id="service_no" value={{$data['service_id']}}>
        <div class="card-body">
          <h6 class="card-title text-mmuted">Price : {{$data['price']}} Rs</h5>
          <a class="btn btn-primary services_id" href={{"#".$data['id']}}>Add To Cart</a>
        </div>
    </div>
    @endforeach
    </form>
    @endsection

    @section('js_content')
      <script src={{asset("plugins/jquery/jquery.min.js")}}></script>
      <script>
          var url='{{ url("/add_to_cart") }}';
            $(document).ready(function(){
              $('a.services_id').click(function(){
                var sub_service_id=$(this).attr('href').replace('#','').split('=');
                var service_id=$('#service_no').val();

                  $.ajax({
                    url: url,
                    type:'get',
                    data:{sub_id:sub_service_id,services_id:service_id},
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
</body>
</html>