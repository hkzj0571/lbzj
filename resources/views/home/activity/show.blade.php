@extends('home.layouts.base')
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@section('title','活动详情')
<link rel="stylesheet" href="/homestyle/css/sstyle.css">
@if(Session::has('notify_message'))
    <div class="alert alert-{{  session('notify_type') }} alert-dismissible text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{  session('notify_message') }}
    </div>
@endif
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
                            <li><a href="/"><span>首页</span></a></li>
                            <li  class="active"><a href="/activity">活动</a></li>
                            <li><a href="/news">新闻</a></li>
                            <li><a href="/#about">关于我们</a></li>
                            <!-- <li><a href="contact.html">Contact</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

@section('css')
    <style>
              li{
                  color: #777;
                  text-decoration: none !important;
                  list-style-type: none;
                  font-family: "Microsoft Yahei", Simsun;
                  overflow: hidden;
              }
              a{

                  text-decoration: none !important;
                  list-style-type: none;
                  font-family: "Microsoft Yahei", Simsun;

              }
        .title{
            text-align: center;
            margin: 1em  0 1em 0;
            font-size: 1.5em;
            line-height: 1em;

        }
        .images{
            width: 100%;
            text-align: center;

        }
      .form-control:focus {
          border-color: #3c8dbc;
          box-shadow: none;
      }

      .form-control {
          border-radius: 15px;
          font-size: 20px !important;
          font-family: "Microsoft Yahei", Simsun;

      }
              .modal-dialog {
                  margin: 100px auto;
              }


    </style>

@stop

{{--<div class="owl-carousel owl-carousel1 owl-carousel-fullwidth fh5co-light-arrow animate-box" data-animate-effect="fadeIn">--}}

    {{--<div class="container-wrap">--}}
<div class="container  fadeInUp animated">
        <div class="col-md-12" id="fh5co-blog" style="padding-top: 2rem; border: 2px solid rgba(0, 0, 0, 0.15);
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
box-shadow: 0 0px 29px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.18824);
    margin-bottom: 1rem;">

            <li class="title">{{ $activitys->name }}</li>

            <li><img class="images" src="{{ $activitys->preview }}" alt="image"></li>
            <div style=" margin: 1em 0 1em 0;">
                <li  class="">
                    <a type="button" class="btn btn-success center-block " data-toggle="modal" data-target="#_create">确认报名</a>
                </li>
            </div>


            <li>发布时间：&nbsp;{{ $activitys->updated_at }}</li>
            <li>活动时间：&nbsp;{{ $activitys->acdate }}</li>

            <li style="margin-top: 1em; color: red;">活动安排：&nbsp; {!!  $activitys->intro  !!}</li>
        </div>
</div>
    {{--</div><!-- END container-wrap -->--}}
{{--</div>--}}

@include('home.activity.create_form',['_formId' => '_create','activity' => $activitys])

@include('home.layouts.footer')
@stop