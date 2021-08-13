<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <meta id="baseUrl" content="{{ url('') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
  <!-- JQVMap -->
  <link rel="stylesheet" href={{asset("plugins/jqvmap/jqvmap.min.css")}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("dist/css/adminlte.min.css")}}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{asset("plugins/daterangepicker/daterangepicker.css")}}>
  <!-- summernote -->
  <link rel="stylesheet" href={{asset("plugins/summernote/summernote-bs4.min.css")}}>
  <!--data table-->
  <link rel="stylesheet" href={{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}>
  <link rel="stylesheet" href={{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}>
  <link rel="stylesheet" href={{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}>
  <!-- Select2 -->
  <link rel="stylesheet" href={{asset("plugins/select2/css/select2.min.css")}}>
  <link rel="stylesheet" href={{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}>
  {{-- toggle --}}
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <style>
    #color{
      background-color :#311b92;
      /*background-color :#3421c0;*/
    }
    hr{
      width: 100%;
      background: #fff;
      margin: 1px;
      padding: 0%;
    }
    /* #a-text-color{
      color:gray;
      background: none;
    }
    .items:hover{
      color: green !important;
      /*background-color: rgba(255, 255, 255, .2)!important;*/
      /*background: none !important;*/
    } */
    .brand-link:hover{
      background: none !important;
    }
    body{
      overflow-x: hidden;
    }
    /* a.active
    {
      background: #007bff!important;
      color: #fff!important;
    }
    a.active:hover
    {
      color: #fff!important;
    } */
  </style>
  @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('layout.header')
    @include('layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          @yield('bread-crumb')
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--main concent-->
        @yield('main-content')
    </div>
    @include('layout.footer')


<!-- ./wrapper -->

<!-- jQuery -->
<script src={{asset("plugins/jquery/jquery.min.js")}}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{asset("plugins/jquery-ui/jquery-ui.min.js")}}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src={{asset("plugins/select2/js/select2.full.min.js")}}></script>
<!-- daterangepicker -->
<script src={{asset("plugins/moment/moment.min.js")}}></script>
<script src={{asset("plugins/daterangepicker/daterangepicker.js")}}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
<!-- overlayScrollbars -->
<script src={{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("dist/js/adminlte.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("dist/js/demo.js")}}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- underscore unique --}}
<script src="http://underscorejs.org/underscore-min.js"></script>
{{-- toggle --}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src={{asset("plugins/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
<script src={{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
<script src={{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
@yield('js-content')
</body>
</html>
