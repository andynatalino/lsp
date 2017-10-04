<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta name="twitter:url" content="{{ Request::url() }}">

  <meta property="og:title" content="@yield('title')" />
  <meta property="og:description" content="Sekolah koding adalah website untuk belajar programming, desain dan web development online" />
  <meta property="og:image" content="http://sekolahkoding.com/assets/images/cover/cover17.png">

  <title>@yield('pageTitle') - Sakasakti</title>

  <link href="/favicon.ico" rel="shortcut icon">
  <link href="/favicon.ico" rel="favicon">

  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-icons.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-responsive.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-schemes.min.css" rel="stylesheet">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <style>
  .login-form {
    width: 25rem;
    height: 18.75rem;
    position: absolute;
    top: 50%;
    margin-top: -9.375rem;
    left: 50%;
    margin-left: -12.5rem;
    background-color: #ffffff;
    opacity: 0;
    -webkit-transform: scale(.8);
    transform: scale(.8);
  }
</style>
</head>
<body>
  @include('layouts.users.menu')
  <div class="container">
    @yield('content')
  </div>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/js/metro.min.js"></script>
  <script type="text/javascript"src='//google.com/recaptcha/api.js'></script>
  <!-- <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script type="text/javascript">
    $(function(){
      $("#carousel").carousel();
    });
    $(function(){
      var form = $(".login-form");

      form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
      });
    });
  </script>
</body>

</html>
