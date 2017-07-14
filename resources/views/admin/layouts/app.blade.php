<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/style/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/style/css/skin-black-light.css">
    <link rel="stylesheet" type="text/css" href="/style/css/simditor.css" />
    @include('admin.layouts.style')
    @yield('css')
</head>
<body class="sidebar-mini wysihtml5-supported fixed skin-black-light">
<div class="wrapper">
    <header class="main-header">
        <a href="/admin/index" class="logo">
            <span class="logo-mini"><b></b></span>
            <span class="logo-lg"><b>老兵</b>之家</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="javascript:;" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
        </nav>
    </header>
    @include('admin.layouts.nav')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.layouts.notify')
            @yield('content')
        </section>
    </div>
    <div class="control-sidebar-bg"></div>
</div>
<script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
@yield('js')
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/style/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/homestyle/js/daterangepicker/daterangepicker.js"></script>
<script src="/homestyle/js/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/style/js/module.js"></script>
<script type="text/javascript" src="/style/js/hotkeys.js"></script>
<script type="text/javascript" src="/style/js/uploader.js"></script>
<script type="text/javascript" src="/style/js/simditor.js"></script>

{{--<script src="https://cdn.bootcss.com/wangeditor/2.1.19/js/lib/jquery-1.10.2.min.js"></script>--}}
{{--<script src="https://cdn.bootcss.com/wangeditor/2.1.19/js/wangEditor.min.js"></script>--}}
<script id="ueditor"></script>
<script>
//    $(function(){
//        var editor = $('#textarea1').wangEditor();
//    });
//    var editor = new wangEditor('editor');
//
//
//
//
//    editor.create();


//var E = window.wangEditor
//var editor = new E('#editor')
//// 或者 var editor = new E( document.getElementById('#editor') )
//editor.create()
$('#datepicker').datepicker({
    autoclose: true
});

for(i=1;i<10;i++){
    $('#datepicker'+i).datepicker({
        autoclose: true
    });
}


    {{--var ue=UE.getEditor("ueditor");--}}
    {{--ue.ready(function(){--}}
        {{--//因为Laravel有防csrf防伪造攻击的处理所以加上此行--}}
        {{--ue.execCommand('serverparam','_token','{{ csrf_token() }}');--}}
    {{--});--}}



    for(i=1;i<10;i++){



        var ues=UE.getEditor("ueditors"+i);


        ues.ready(function(){
            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ues.execCommand('serverparam','_token','{{ csrf_token() }}');
        });
    }



var editor = new Simditor({
    textarea: $('#editor')

    //optional options
});












</script>
</body>
</html>
