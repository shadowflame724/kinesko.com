@extends('client.template.layout')

@section('page-title', 'Kinesko - блог')

@section('page-style')
    <link rel="stylesheet" href="/css/libs/star-rating.css"> <!-- star-rating.css -->
@stop

@section('content')

<!-- start of portfolio-material -->
<section id="portfolio-material">
    <div class="main-top-container bg-cont" style="background-image: url('/storage/{{ $service->image }}');">
        <div class="container">
            <div class="page-head">
                <div class="bread-crumbs">
                    <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                    <a href="{{ route('client.portfolio.index') }}">@lang('client.menu.portfolio')</a>
                    <span class="active">{{ $portfolio->{'title' . $langSuf} }}</span>
                </div>
                <h1 class="page-title">{{ $portfolio->{'title' . $langSuf} }}</h1>
                <h2 class="portfolio-category">{{ $portfolio->category->{'title' . $langSuf} }}</h2>
            </div>

            <nav class="tag-nav">
                <ul>
                    <li class="tag-nav-head">
                        <p>Теги:</p>
                    </li>
                    @foreach(explode(',', $portfolio->tags) as $tag)
                    <li>
                        <!-- add link to search page with query = {tag} -->
                        <a href="{{ route('client.search', ['query' => $tag]) }}">
                            <span>{{ $tag }}</span>
                        </a>
                    </li>
                    @endforeach

                </ul>
            </nav>

            <div class="material-general-info">
                <p class="material-date">{{ $portfolio->created_at->formatLocalized('%d %B %Y') }}</p>
                <p class="portfolio-views">просмотров {{ $portfolio->views }}</p>
            </div>

        </div>
    </div>

    <!-- start of white wrapper -->
    <div class="material-wrapper white-wrapper triangle-left">
        <div class="container">
            <div class="row">
                @foreach($whiteBlocks as $block)
                    @include('client.template.blocks_switch_case')
                @endforeach
            </div>
        </div>
    </div>
    <!-- end of white wrapper -->

    <!-- start of black wrapper -->
    <div class="material-wrapper black-wrapper triangle-right">
        <div class="container">
            <div class="row">
                @foreach($blackBlocks as $block)
                    @include('client.template.blocks_switch_case')
                @endforeach
            </div>
        </div>
    </div>
    <!-- end of black wrapper -->

    <!-- start of rating-comments-block -->
    <div class="rating-comments-block triangle-left">
        <div class="container">
            <!-- start of star-rating-cont -->
            <div class="star-rating-cont">
                <div class="star-rating">
                    <input class="rating" value="@if($portfolio->votes == 0) 0 @else{{ $portfolio->rating / $portfolio->votes }}@endif" type="number">
                </div>
                <p class="voices-count">голосов - <span>{{ $portfolio->votes }}</span></p>
            </div>
            <!-- end of star-rating-cont -->

            <!-- start of comments-block -->
            <div class="comments-block">
                <!-- add HyperComments widget with the same ID as on KLONA -->
                <div class="hypercomments">
                    <div id="hypercomments_widget"></div>
                    <script type="text/javascript">
                        _hcwp = window._hcwp || [];
                        _hcwp.push({widget: "Stream", widget_id: 73852, hc_disable: 1});
                        (function () {
                            if ("HC_LOAD_INIT" in window)return;
                            HC_LOAD_INIT = true;
                            var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
                            var hcc = document.createElement("script");
                            hcc.type = "text/javascript";
                            hcc.async = true;
                            hcc.src = ("https:" == document.location.protocol ? "https" : "http") + "://w.hypercomments.com/widget/hc/73852/" + lang + "/widget.js";
                            var s = document.getElementsByTagName("script")[0];
                            s.parentNode.insertBefore(hcc, s.nextSibling);
                        })();
                    </script>
                    <a href="http://hypercomments.com" class="hc-link" title="comments widget">
                        comments powered by HyperComments
                    </a>
                </div>
                <!-- end of  HyperComments widget -->
            </div>
            <!-- end of comments-block -->
        </div>
    </div>
    <!-- end of rating-comments-block -->


</section>
<!-- end of portfolio-material -->

{{--//= template/portfolio-block-small.html--}}
@include('client.template.portfolio-block-small')
@stop

<!-- scripts only for portfolio-material pages -->
@section('page-scripts')
<script src="/js/libs/star-rating.js"></script>

<script>
    //  star rating initialization

    var voicesCount = document.querySelector(".voices-count span");
    voicesCount.innerText = (+voicesCount.innerText).toLocaleString();

    // start of star-rating initialization
    $(".rating").rating({min: 1, max: 5, step: 0.5, size: 'sm'});
    $('.clear-rating').hide();
    $('.caption').hide();
    // end of of star-rating initialization

</script>

@stop