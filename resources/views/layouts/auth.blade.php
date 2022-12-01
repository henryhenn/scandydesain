<!doctype html>
<html lang="en">
<head>
    <title>@yield('title') | Scandy Desain</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('template/auth/css/style.css')}}">

</head>
<body class="img" style="background-image: url('{{asset('template/frontend/images/hero_bg_1.jpg')}}');">
@yield('content')

<script src="{{asset("template/auth/js/jquery.min.js")}}"></script>
<script src="{{asset("template/auth/js/popper.js")}}"></script>
<script src="{{asset('template/auth/js/bootstrap.min.js')}}"></script>
<script src="{{asset("template/auth/js/main.js")}}"></script>

</body>
</html>

