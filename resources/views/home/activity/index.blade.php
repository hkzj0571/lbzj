@extends('home.layouts.base')

@section('title','活动列表')
<link rel="stylesheet" href="/homestyle/css/sstyle.css">
@section('content')

    <header role="banner" id="fh5co-header" class=" fadeInUp animated">
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
                            <li    class="active"><a href="/activity">野营训练路线</a></li>
                            <li><a href="/news">老兵讯息</a></li>
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
            .main-name{
                text-decoration: none !important;
                list-style-type: none;
                font-family: "Microsoft Yahei", Simsun;
                margin-bottom: 1rem;
            }
    </style>

@stop

{{--<div class="owl-carousel owl-carousel1 owl-carousel-fullwidth fh5co-light-arrow animate-box" data-animate-effect="fadeIn">--}}

    {{--<div class="container-wrap">--}}
        <div id="fh5co-blog" style="padding-top: 2rem;">
            {{--<div class="row" style="margin-bottom: 30px">--}}
                {{--<div class="col-lg-8">--}}
                    {{--<div class="btn-group-us">--}}
                        {{--<button type="button" class="btn btn-info">点击数&nbsp;<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>--}}
                        {{--<button type="button" class="btn btn-default">收藏数</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4">--}}
                    {{--<form action="">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" name="keywork" placeholder="输入书名或作者名...">--}}
                            {{--<span class="input-group-btn">--}}
                         {{--<button class="btn btn-default btn-seach" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                {{--<div class="alert alert-info alert-dismissible text-center">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                {{--搜索 「 傻逼 」的结果--}}
                {{--</div>--}}
                @foreach($activitys as $activity)
                    <div class="col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="/activity/show/{{ $activity->id }}" class="blog-bg"  style="background-image: url({{ $activity->preview }});"></a>
                            <div class="blog-text">
                                <span class="posted_on" style="font-family: comic sans ms; color: #004100;">活动时间: {{ $activity->acdate }}</span>
                                <li class="main-name"><a href="#">{{ $activity->name }}</a></li>

                                <ul class="stuff">
                                    {{--<li><i class="icon-heart3"></i>0</li>--}}
                                    <li><i class="icon-user-plus"></i>{{count($activity->member)}}</li>
                                    <li><a href="/activity/show/{{ $activity->id }}" style="font-family: comic sans ms; font-size: 16px;">查看<i class="icon-arrow-right22"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<div class="col-md-4">--}}
                    {{--<div class="fh5co-blog animate-box">--}}
                        {{--<a href="#" class="blog-bg"  style="background-image: url(/homestyle/images/work-2.jpg);"></a>--}}
                        {{--<div class="blog-text">--}}
                            {{--<span class="posted_on">1</span>--}}
                            {{--<h3><a href="#">1</a></h3>--}}
                            {{--<p>1</p>--}}
                            {{--<ul class="stuff">--}}
                                {{--<li><i class="icon-heart3"></i>1</li>--}}
                                {{--<li><i class="icon-eye2"></i>1</li>--}}
                                {{--<li><a href="#">查看<i class="icon-arrow-right22"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-4">--}}
                    {{--<div class="fh5co-blog animate-box">--}}
                        {{--<a href="#" class="blog-bg"  style="background-image: url(/homestyle/images/work-2.jpg);"></a>--}}
                        {{--<div class="blog-text">--}}
                            {{--<span class="posted_on">1</span>--}}
                            {{--<h3><a href="#">1</a></h3>--}}
                            {{--<p>1</p>--}}
                            {{--<ul class="stuff">--}}
                                {{--<li><i class="icon-heart3"></i>1</li>--}}
                                {{--<li><i class="icon-eye2"></i>1</li>--}}
                                {{--<li><a href="#">查看<i class="icon-arrow-right22"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="row text-center">
                    {!! $activitys->render() !!}
                </div>

            </div>
        </div>
    {{--</div><!-- END container-wrap -->--}}
{{--</div>--}}

@include('home.layouts.footer')
@stop