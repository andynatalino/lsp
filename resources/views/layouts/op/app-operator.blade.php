<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@yield('pageTitle') - Operator</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.0/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.0/css/skins/_all-skins.min.css"  rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
  <link href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" type="text/css">
  <link href="//code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body class="skin-blue">
  <div class="wrapper">

    @include('layouts.op.header-op')

    @include('layouts.op.sidebar-op')

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          @yield('pageTitle')
          <!-- <small>{{ $page_description or null }}</small> -->
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ url('/operator')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li class="active">@yield('pageTitle')</li>
        </ol>
      </section>

      <section class="content">
        @yield('content')
      </section>
    </div>

    @include('layouts.op.footer-op')

  </div>
  @yield('js')
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ url ('bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ url ('//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
</body>
</html>
