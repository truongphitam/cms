<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @if(isset($_title))
            {!! $_title !!}
        @endif
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/assets/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/assets/admin/dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/assets/admin/custom/admin.css">
    <script>
        var baseURL = '{{url('/')}}';
    </script>

    @yield('css')
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.blocks.header')
    @include('admin.blocks.aside')
    <div class="content-wrapper">
        {{ Route::currentRouteName() }}
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="">
                    @if(isset($_title))
                        {!! $_title !!}
                    @endif
                </li>
            </ol>
        </section>
        <section class="content">
            @include('admin.blocks.alert')
            @yield('content')
        </section>
    </div>
    @include('admin.blocks.footer')
    <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="/assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/assets/admin/bower_components/raphael/raphael.min.js"></script>
<script src="/assets/admin/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- daterangepicker -->
<script src="/assets/admin/bower_components/moment/min/moment.min.js"></script>
<script src="/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/admin/dist/js/demo.js"></script>
<script src="/assets/plugins/ckfinder/ckfinder.js"></script>
<script src="/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/assets/admin/custom/admin.js"></script>
<script type="text/javascript">
    window.current_locale = '{{ $current_locale }}';
    window._token = '{{ csrf_token() }}';
</script>
@yield('js')
</body>
</html>