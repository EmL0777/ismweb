<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - ISM Official Web</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/font-awesome-4.1.0/css/font-awesome.min.css') }}">
</head>
<body>
<div class="wrapper"><!-- /.wrapper -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"><!-- /.navbar-static-top -->
        <div class="navbar-header"><!-- /.navbar-header -->
            <a class="navbar-brand" href="/">ISM Official Web Admin</a>
        </div><!-- /.navbar-header -->
    </nav><!-- /.navbar-static-top -->

    <!-- 內頁 -->
    <div class="container-fluid">
        @yield('content')
    </div><!-- /.container-fluid -->
    <!-- /.內頁 -->
</div><!-- /.wrapper -->

<script src="{{ asset('/assets/js/jquery.js') }}" defer></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('/assets/js/plugins/metisMenu/metisMenu.min.js') }}" defer></script>
<script src="{{ asset('/assets/js/sb-admin-2.js') }}" defer></script>
</body>
</html>
