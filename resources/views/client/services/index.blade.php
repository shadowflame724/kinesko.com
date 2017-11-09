@extends('client.template.layout')

@section('page-title', $page->{'seo_title' . $langSuf})
@section('page-description', $page->{'meta_description' . $langSuf})
@section('page-keywords', $page->{'meta_keywords' . $langSuf})

@section('content')

    <!-- start of company-page -->
    <section id="services-page">
        <div class="main-top-container bg-cont">
            <div class="dark-mask"></div>
            <div class="container">
                <div class="page-head">
                    <div class="bread-crumbs">
                        <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                        <span class="active">@lang('client.menu.services')</span>
                    </div>
                    <h1 class="page-title">@lang('client.menu.services')</h1>
                </div>
            </div>

            <div id="my-thumbs-list">
                <div class="dark-mask">
                    <ul>
                        @foreach($serviceCategories as $key => $category)
                            <li class="slider-item" data-number="{{ $key }}">

                                <p class="slide-title">{{ $category->{'title' . $langSuf} }}</p>

                                <div class="slide-links">
                                    <hr class="inclined-line">
                                    @foreach($category->services->where('on_main_page', 1)->slice(0,7) as $service)
                                        <a href="{{ route('client.services.show', ['service' => $service->slug]) }}">{{ $service->{'title' . $langSuf} }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="visual-wrapper">
                        <div class="visual vis-0" data-number="0">
                            <video autoplay loop muted>
                                <source src="/video/kinesko-main-video.mp4"
                                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            </video>
                        </div>
                        <div class="visual" data-number="1">
                            <video autoplay loop muted>
                                <source src="/video/kinesko-main-video.mp4"
                                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            </video>
                        </div>
                        <div class="visual" data-number="2">
                            <video autoplay loop muted>
                                <source src="/video/kinesko-main-video.mp4"
                                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            </video>
                        </div>
                        <div class="visual" data-number="3">
                            <video autoplay loop muted>
                                <source src="/video/kinesko-main-video.mp4"
                                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            </video>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- start of all-services -->
        <div class="all-services triangle-left">
            <div class="container">
                <h3 class="section-header black-color">@lang('client.services.index_header')</h3>
            </div>

            <div class="services-container">
                @foreach($serviceCategories as $key => $serviceCategory)
                    @php($count = $key + 1)
                    <div id="category-{{ $key }}" class="service-category-cont">
                        <div class="promo-block"
                             style="background-image: {{ url('/images/services/service-image-'.$count.'.jpg') }})">
                            <div class="dark-mask"></div>
                            <div class="promo-info">
                                <i class="icon icon-service-{{ $count }}"></i>
                                <h2 class="service-item-title">
                                    <a class="link-to-portfolio"
                                       href="{{ route('client.portfolio.index', ['slug' => $serviceCategory->slug]) }}">
                                        {{ $serviceCategory->{'title' . $langSuf} }}
                                    </a>
                                </h2>
                            </div>
                        </div>
                        <div class="list-block">
                            <ul class="service-item-list">
                                @foreach($serviceCategory->services as $service)
                                    <li>
                                        <a href="{{ route('client.services.show', ['service' => $service->slug]) }}">{{  $service->{'title' . $langSuf} }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end of all-services -->

        {{--//= template/portfolio-block-small.html--}}
        @widget('PortfolioSmall')

    </section>
    <!-- end of company-page -->
@stop

@section('page-scripts')
    <!--    slider mThumbnailScroller   -->
    <!--<script src="js/libs/jquery.mThumbnailScroller.min.js"></script>-->

    <script src="/js/services.js"></script>
@stop