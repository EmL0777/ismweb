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
    <main id="main">
        @yield('content')
    </main>

    <script src="{{ asset('/assets/js/jquery.js') }}" defer></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/plugins/metisMenu/metisMenu.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/sb-admin-2.js') }}" defer></script>
</body>
</html>
