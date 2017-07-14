@extends('home.layouts.base')

@section('title','新闻列表')
{{--<link rel="stylesheet" href="/homestyle/css/sstyle.css">--}}

<link rel="stylesheet" type="text/css" href="/homestyle/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/homestyle/css/zzsc-demo.css"/>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="/homestyle/css/paper-collapse.min.css">



@section('content')

    <header role="banner" id="fh5co-header"  class=" fadeInUp animated">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="row">
                    <div class="col-md-3">
                        <div class="fh5co-navbar-brand">
                            <a class="fh5co-logo" href="/">老兵之家</a>
                        </div>
                    </div>
                    <div class="col-md-9 main-nav">
                        <ul class="nav text-right" id="tests">
                            <li><a href="/"><span>老兵首页</span></a></li>
                            <li ><a href="/activity">野营训练路线</a></li>
                            <li  class="active"><a href="/news">老兵讯息</a></li>
                            <li><a href="#about">关于我们</a></li>
                            <!-- <li><a href="contact.html">Contact</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

@section('css')
    <style>
            li{color: #777;
                text-decoration: none !important;
                list-style-type:none;
                font-family: "Microsoft Yahei", Simsun;
            }
            .image-up{

                transform-style: preserve-3d;
                display: block;
                width: 100%;
                -webkit-transform-style: preserve-3d;
                vertical-align: middle;
            }
        img{
            width: 100%;
        }
    </style>

@stop

{{--<div class="owl-carousel owl-carousel1 owl-carousel-fullwidth fh5co-light-arrow animate-box" data-animate-effect="fadeIn">--}}

    {{--<div class="container-wrap">--}}
        <div id="fh5co-blog" style="padding-top: 2rem;">

            {{--<div class="row">--}}
                <section>
                    <div class="container">

                        @foreach($newses as $news)
                        <div class="collapse-card animate-box " style="box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.18824); margin-bottom: 1rem;">
                            <div class="collapse-card__heading">
                                <h4 class="collapse-card__title">
                                    <li style="font-size: 25px; float: left;">&nbsp;<i class="icon-up"></i></li>
                                   <li  style="font-size: 16px;margin-bottom: 1rem;">{{ $news->name }}</li>
                                    <img class="image-up" src="{{ $news->preview }}" alt="image">
                                    {{--<div style="background-color: black; width: 100px;height: 100px;"></div>--}}
                                </h4>
                            </div>
                            <div class="collapse-card__body" style="margin:0 2rem 0 2rem;">
                               {!! $news->intro !!}
                            </div>
                        </div>
                            @endforeach





                    </div>
                </section>


                <div class="row text-center">
                    {{--{!! $activitys->render() !!}--}}
                </div>

            </div>
        {{--</div>--}}
    {{--</div><!-- END container-wrap -->--}}
{{--</div>--}}



@include('home.layouts.footer')
@stop

@section('js')
    <script src="/homestyle/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="/homestyle/js/paper-collapse.min.js"></script>
    <script>
        $('.collapse-card').paperCollapse();


    </script>

@stop