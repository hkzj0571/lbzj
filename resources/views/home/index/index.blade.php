@extends('home.layouts.base')

@section('title','首页')

@section('content')

    @include('home.layouts.head')

@section('css')
    <style>
        .cover{
            position: absolute;
            width: 100%;
            height: 55px;
            background: rgba(0,0,0,.5);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#55000000',endColorstr='#55000000')\9;
            font-size: 20px;
            color: #fff;
            padding-left: 2%;
            font-family: "Microsoft YaHei","\5FAE\8F6F\96C5\9ED1","SimSun","\5B8B\4F53";
            text-decoration : none;
            left: 0;
            bottom: 0;
        }
        .owl-carousel-fullwidth.owl-theme .owl-dots {
            bottom: 0;
            margin-bottom: -7px;
        }
        .main-sky{
            width: auto;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            font-family: comic sans ms;
        }
        .main-sky a:hover{
            text-decoration: none !important;
            color:greenyellow !important;
            font-size: 25px !important;
        }

    </style>

    @stop

    <div class="owl-carousel owl-carousel1 owl-carousel-fullwidth fh5co-light-arrow animate-box" data-animate-effect="fadeIn">

         @foreach($newses as $news)
            <div class="item">
                <a href="/news" class="image-popup"><img src="{{ $news->preview }}" alt="image"></a>
                <div class="cover">
                    <p class="main-sky"><a style="color: white;text-decoration : none;" href="/news" target="_blank"  > {{ $news->name }} </a></p>
                </div>
            </div>
         @endforeach



        {{--<div class="item"><a href="images/img_large_2.jpg" class="image-popup"><img src="/homestyle/images/img_large_2.jpg" alt="image"></a></div>--}}
        {{--<div class="item"><a href="images/img_large_3.jpg" class="image-popup"><img src="/homestyle/images/img_large_3.jpg" alt="image"></a></div>--}}
        {{--<div class="item"><a href="images/img_large_4.jpg" class="image-popup"><img src="/homestyle/images/img_large_4.jpg" alt="image"></a></div>--}}
        {{--<div class="item"><a href="images/img_large_5.jpg" class="image-popup"><img src="/homestyle/images/img_large_5.jpg" alt="image"></a></div>--}}
    </div>
    <div id="fh5co-media-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center heading-section">
                    <h3 style="font-family: comic sans ms;">好友再聚</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 animate-box">
                    <a href="/activity/show/{{ $activit->id }}">
                    <div class="fh5co-cover" style="background-image: url({{ $activit->preview }});">
                        <div class="desc">
                            <p style="font-family: comic sans ms;">{{ $activit->name }}</p>
                            <span style="color: white">{{ $activit->acdate }}</span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-5">
                    <div class="fh5co-cover">

                        @foreach($activitys as $activity)
                            @if($activity->id != $activit->id)
                                <div class="fh5co-cover-hero animate-box">
                                    <a href="/activity/show/{{ $activity->id }}">
                                    <div class="fh5co-cover-thumb" style="background-image: url({{ $activity->preview }});"></div>
                                    <div class="desc-thumb">
                                        <p style="font-family: comic sans ms;">{{ $activity->name }}</p>
                                        <span >{{ $activity->acdate }}</span>
                                    </div>
                                    </a>
                                </div>
                            @endif

                        @endforeach

                        {{--<div class="fh5co-cover-hero animate-box">--}}
                            {{--<div class="fh5co-cover-thumb" style="background-image: url(/homestyle/images/work-3.jpg);"></div>--}}
                            {{--<div class="desc-thumb">--}}
                                {{--<p>Far far away, behind the word mountains, far from the</p>--}}
                                {{--<span>User Experience</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="fh5co-cover-hero animate-box">--}}
                            {{--<div class="fh5co-cover-thumb" style="background-image: url(/homestyle/images/work-4.jpg);"></div>--}}
                            {{--<div class="desc-thumb">--}}
                                {{--<p>Far far away, behind the word mountains, far from the</p>--}}
                                {{--<span>Web Developement</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END fh5co-media-section -->
    <div id="fh5co-intro-section">
        <div class="fh5co-intro-cover text-center animate-box" data-animate-effect="fadeIn" data-stellar-background-ratio="0.5" style="background-image: url(/homestyle/images/intro.jpg);">
            <a href="#" class="btn">Serving You Is Our First Priority</a>
        </div>
    </div>
    <!-- END fh5co-intro-section -->
    <div id="fh5co-product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3 style="font-family: comic sans ms;">军事新闻</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <div class="owl-carousel owl-carousel2">

                @foreach($newss as $newsss)
                <div class="item animate-box">
                    <a href="" class="image-popup">
                        <img src="{{ $newsss->preview }}" alt="image">
                    </a>
                </div>
                @endforeach

                {{--<div class="item animate-box"><a href="images/product-2.jpg" class="image-popup"><img src="/homestyle/images/product-2.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-3.jpg" class="image-popup"><img src="/homestyle/images/product-3.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-4.jpg" class="image-popup"><img src="/homestyle/images/product-4.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-1.jpg" class="image-popup"><img src="/homestyle/images/product-1.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-2.jpg" class="image-popup"><img src="/homestyle/images/product-2.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-3.jpg" class="image-popup"><img src="/homestyle/images/product-3.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-4.jpg" class="image-popup"><img src="/homestyle/images/product-4.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-1.jpg" class="image-popup"><img src="/homestyle/images/product-1.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-2.jpg" class="image-popup"><img src="/homestyle/images/product-2.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-3.jpg" class="image-popup"><img src="/homestyle/images/product-3.jpg" alt="image"></a></div>--}}
                {{--<div class="item animate-box"><a href="images/product-4.jpg" class="image-popup"><img src="/homestyle/images/product-2.jpg" alt="image"></a></div>--}}
            </div>
        </div>
    </div>
    <!-- END fh5co-product-section -->
    <div id="fh5co-section" class="fh5co-grey-section"><a href=""name="about"></a>
        <div class="container">
            <div class="row">
                <div class="col-md-4 animate-box">
                    <div class="fh5co-inner">
                        <i class="icon-shield"></i>
                        <div class="holder-section">
                            <h3>About Us</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="fh5co-inner">
                        <i class="icon-strategy"></i>
                        <div class="holder-section">
                            <h3>What We Doe</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="fh5co-inner">
                        <i class="icon-bike"></i>
                        <div class="holder-section">
                            <h3>Why We Choose Us</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('home.layouts.footer')
@stop