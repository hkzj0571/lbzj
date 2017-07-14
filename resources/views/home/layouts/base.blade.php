<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--<link rel="shortcut icon" href="/favicon.ico"/>--}}
    <!-- Animate.css -->
    <link rel="stylesheet" href="/homestyle/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/homestyle/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/homestyle/css/bootstrap.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/homestyle/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/homestyle/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/homestyle/css/style.css">

    {{--<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">--}}
    <!-- Modernizr JS -->
    <script src="/homestyle/js/modernizr-2.6.2.min.js"></script>
    {{--@include('admin.layouts.style')--}}
    @yield('css')
</head>
<body>

<div class="box-wrap">

    @yield('content')

</div>

@yield('js')
<!-- jQuery -->
<script src="/homestyle/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/homestyle/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/homestyle/js/bootstrap.min.js"></script>
<!-- Owl carousel -->
<script src="/homestyle/js/owl.carousel.min.js"></script>
<!-- Waypoints -->
<script src="/homestyle/js/jquery.waypoints.min.js"></script>
<!-- Parallax Stellar -->
<script src="/homestyle/js/jquery.stellar.min.js"></script>

<!-- Main JS (Do not remove) -->
<script src="/homestyle/js/main.js"></script>
<script src="/homestyle//style/js/app.js"></script>
{{--<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
<script>

//        $("#tests li").live("click",function(){
//        $("#tests li").click(function() {



//            $(this).siblings('li').removeClass('active');  // 删除其他兄弟元素的样式
//
//            $(this).addClass('active');                            // 添加当前元素的样式

//        });



</script>

</body>
</html>
