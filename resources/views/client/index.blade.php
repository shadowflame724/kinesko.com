@extends('client.template.layout')

@section('page-title', $page->{'title' . $langSuf})

@section('content')
    <section id="index-page">
        <div class="main-top-container bg-cont">
            <div class="dark-mask"></div>

            <div class="main-video-cont">
                <video autoplay loop muted preload="auto">
                    <!--<source src="video/kinesko-main-video.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>-->
                    <source src="/video/madonna.ogv">
                    @lang('client.index.video_error')
                </video>
            </div>

            <div class="container">
                <h1 class="main-header animated fadeIn">
                    @lang('client.index.header')
                </h1>
                <div class="order-btns">
                    <div class="view-example-btn">
                        <a href="portfolio-material.html" class="skew-right gl-transparent-btn">
                            <span class="skew-left">@lang('client.index.show_example')</span>
                        </a>
                    </div>
                    <div class="order-form-btn">
                        <a href="/" class="skew-left gl-transparent-btn">
                            <span class="skew-right">@lang('client.general.make_request')</span>
                        </a>
                    </div>
                    <!--<a href="portfolio-material.html" class="skew-right gl-transparent-btn view-example-btn">-->
                    <!--<span class="skew-left">посмотреть пример</span>-->
                    <!--</a>-->
                    <!--<a href="/" class="skew-left gl-transparent-btn order-form-btn">-->
                    <!--<span class="skew-right">оформить заказ</span>-->
                    <!--</a>-->
                </div>
            </div>
        </div>

        <!-- start of our-services -->
        <div class="our-services triangle-left">
            <div class="container">
                <h3 class="section-header black-color">@lang('client.index.our_services')</h3>

                <div class="our-services-wrapper">
                    <div class="row">
                        @foreach($serviceCategories as $key =>  $serviceCategory)
                            @php($count = $key + 1)
                            <div class="col-sm-6 col-lg-3 service-item">
                                <a class="link-to-service" href="/services#category-{{ $count }}">
                            <span class="icon-cont">
                                <i class="icon icon-service-{{ $count }}"></i>
                                <i class="icon icon-hover icon-service-{{ $count }}-hover"></i>
                            </span>
                                </a>
                                <h2 class="service-item-title">
                                    <a class="link-to-service" href="/services#category-{{ $count }}">
                                        {{ $serviceCategory->{'title' . $langSuf} }}
                                    </a>
                                </h2>
                                <hr class="inclined-line">
                                <ul class="service-item-list">
                                    @foreach($serviceCategory->services as $service)
                                        <li>
                                            <a href="{{ route('client.services.show', ['service' => $service->slug]) }}">{{ $service->{'title' . $langSuf} }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- end of our-services -->

        <!-- start of our-works -->
        <div class="our-works triangle-right">
            <div class="container">
                <h3 class="section-header white-color">@lang('client.blog-sidebar.our_work')</h3>
            </div>

            {{--//= template/portfolio-block-big.html--}}
            {{--@include('client.template.portfolio-block-big')--}}
            @widget('PortfolioBig')

            <div class="achievments-cont">
                <div class="achievment-item-cont">
                    <div class="achievment-item">
                        <div class="left-block">
                            <!--<div class="img-cont">-->
                            <!--<img src="/images/index/infographic-1.png" alt="infographic-photo">-->
                            <!--</div>-->
                            <div class="canvas-cont">
                                <canvas class="circle-diagram" width="300" height="300" data-percents="{{ setting('site.main_percent_left') }}"></canvas>
                            </div>
                        </div>
                        <div class="right-block">
                            <p class="achievment-info">
                                @lang('client.index.fr_achiev_text', ['count' => setting('site.main_percent_left')])

                            </p>
                        </div>
                    </div>
                </div>
                <div class="achievment-item-cont">
                    <div class="achievment-item">
                        <div class="left-block">
                            <div class="canvas-cont">
                                <canvas class="circle-diagram" width="300" height="300" data-percents="{{ setting('site.main_percent_right') }}"></canvas>
                            </div>
                        </div>
                        <div class="right-block">
                            <p class="achievment-info">
                                @lang('client.index.sc_achiev_text', ['count' => setting('site.main_percent_left')])
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-cont">
                <a href="/" class="skew-right gl-transparent-btn your-project-btn order-form-btn">
                    <span class="skew-left">@lang('client.forms.form_header')</span>
                </a>
            </div>
        </div>
        <!-- end of our-works -->

        <!-- start of photo-gallery-->
        <div class="photo-gallery triangle-right">
            <div class="container">
                <h3 class="section-header black-color">@lang('client.blog-sidebar.header')</h3>
            </div>

            <div class="photo-gallery-cont clearfix">
                <div class="photo-cont">
                    <div class="img-cont">
                        <img src="/images/index/photo-1.jpg" alt="kinesko-team-photo">
                    </div>
                    <div class="two-img-cont clearfix">
                        <div class="img-cont">
                            <img src="/images/index/photo-2.jpg" alt="kinesko-team-photo">
                        </div>
                        <div class="img-cont">
                            <img src="/images/index/photo-3.jpg" alt="kinesko-team-photo">
                        </div>
                    </div>
                </div>

                <div class="photo-cont clearfix">
                    <div class="two-img-cont clearfix">
                        <div class="img-cont">
                            <img src="/images/index/photo-4.jpg" alt="kinesko-team-photo">
                        </div>
                        <div class="img-cont">
                            <img src="/images/index/photo-5.jpg" alt="kinesko-team-photo">
                        </div>
                    </div>
                    <div class="img-cont">
                        <img src="/images/index/photo-6.jpg" alt="kinesko-team-photo">
                    </div>
                </div>

                <div class="photo-cont clearfix">
                    <div class="img-cont">
                        <img src="/images/index/photo-7.jpg" alt="kinesko-team-photo">
                    </div>
                    <div class="two-img-cont clearfix">
                        <div class="img-cont">
                            <img src="/images/index/photo-8.jpg" alt="kinesko-team-photo">
                        </div>
                        <div class="img-cont">
                            <img src="/images/index/photo-9.jpg" alt="kinesko-team-photo">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end of photo-gallery -->

        <!-- start of about-us -->
        <div class="about-us">
            <div class="container">
                <h3 class="section-header yellow-color">@lang('client.index.about_us')</h3>
                <div class="row info-block-cont">
                    <div class="col-md-6 title-cont">
                        <h3 class="title">
                            @lang('client.index.about_us_title')
                        </h3>
                    </div>
                    <div class="col-md-6 text-cont">
                        @lang('client.index.about_us_text')
                    </div>
                </div>
            </div>
        </div>
        <!-- end of about-us -->
    </section>
    {{--//= template/our-materials.html--}}
    {{--@include('client.template.our-materials')--}}
    @widget('OurMaterial')
@stop

@section('page-scripts')
    <!-- scriots only this on page -->
    <script src="/js/index.js"></script>
    <!-- only this page -->
@stop
