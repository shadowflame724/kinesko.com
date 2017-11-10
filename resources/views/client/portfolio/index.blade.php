@extends('client.template.layout')

@section('page-title', $page->{'seo_title' . $langSuf})
@section('page-description', $page->{'meta_description' . $langSuf})
@section('page-keywords', $page->{'meta_keywords' . $langSuf})

@section('content')

<!-- start of portfolio-page -->
<section id="portfolio-page">
    <div class="main-top-container bg-cont">
        <div class="container">
            <div class="page-head">
                <div class="bread-crumbs">
                    <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                    <span class="active">@lang('client.menu.portfolio')</span>
                </div>
                <h1 class="page-title">@lang('client.menu.portfolio')</h1>
            </div>

            <nav class="portfolio-nav">
                <ul>
                    <li @if($categoryId == null) class="active" @endif>
                        <a href="{{ route('client.portfolio.index') }}">
                            <span>@lang('client.general.all_categories')</span>
                        </a>
                    </li>
                    @foreach($categories as $category)
                        <li @if($categoryId != null AND $categoryId == $category->id) class="active" @endif>
                            <a href="{{ route('client.portfolio.category', ['category' => $category->slug]) }}">
                                <span>{{ $category->{'title' . $langSuf} }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

        </div>
    </div>

    <div class="portfolio-cont triangle-left">

        <div class="flex-cont">
            @foreach($portfolio->slice(0,8) as $item)
            <!-- box-1 -->
            <div class="portfolio-item">
                <div class="poster-img-cont">
                    <img src="/storage/{{ $item->image_thumb }}" alt="{{ $item->image_thumb_alt }}">
                </div>
                <div class="hover-layer" style="color: #2e042a;">
                    <h3 class="portfolio-name">
                        {{ $item->{'title' . $langSuf} }}
                    </h3>
                    <h2 class="portfolio-category">
                        <a class="link-to-category" href="{{ route('client.services.index') }}">
                            {{ $item->category->{'title' . $langSuf} }}
                        </a>
                    </h2>
                    <a href="{{ route('client.portfolio.show', ['category' => $item->category->slug, 'portfolio' => $item->slug]) }}"
                    {{--<a href="{{ $item->category->slug }}/{{  $item->slug }}"--}}

                       class="skew-right gl-transparent-btn white-border go-portfolio-btn">
                        <span class="skew-left">@lang('client.general.go_to')</span>
                    </a>
                </div>
            </div>
            @endforeach


            <!-- box-(9, 10) - BIG -->
            <div class="order-cont bg-cont">
                <a href="/" class="skew-right gl-transparent-btn order-form-btn">
                    <span class="skew-left">@lang('client.general.make_request')</span>
                </a>
            </div>

            @foreach($portfolio->slice(8) as $item)
                <!-- box-1 -->
                    <div class="portfolio-item">
                        <div class="poster-img-cont">
                            <img src="/images/general/portfolio-4.jpg" alt="portfolio-picture">
                        </div>
                        <div class="hover-layer" style="color: #2e042a;">
                            <h3 class="portfolio-name">
                                {{ $item->{'title' . $langSuf} }}
                            </h3>
                            <h2 class="portfolio-category">
                                <a class="link-to-category" href="{{ route('client.services.index', ['category' => $item->category->slug]) }}">
                                    {{ $item->category->{'title' . $langSuf} }}
                                </a>
                            </h2>
                            <a href="{{ route('client.portfolio.index', ['category' => $item->category->slug, 'portfolio' => $item->slug]) }}"
                               class="skew-right gl-transparent-btn white-border go-portfolio-btn">
                                <span class="skew-left">@lang('client.general.go_to')</span>
                            </a>
                        </div>
                    </div>
            @endforeach

            </div>
        </div>

        <a href="/" class="skew-right gl-yellow-btn more-portfolio-btn">
            <span class="skew-left">@lang('client.general.more_jobs')</span>
        </a>

    </div>

</section>
<!-- end of portfolio-page -->
@stop

@section('page-scripts')

<script>
    $(function () {
        $(".more-portfolio-btn").click(function (event) {
            event.preventDefault();
            $(this.querySelector("span")).toggleText("больше работ", "меньше работ");
            $(".more-portfolio-cont").slideToggle();
        });


        // ANIMATION BLOCK
        if (!isMobileViewFlag) {
            // ****************************************************************************
            // *************     ANIMATIONS FOR THIS PAGE    *************

            $('.more-portfolio-btn').addClass("transparent").viewportChecker({
                classToAdd: 'animated flash',
                classToRemove: 'transparent',
                offset: 0,
                delay: 1000
            });
        }
    });
</script>
@stop