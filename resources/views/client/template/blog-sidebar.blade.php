<!-- start of blog-sidebar -->
<div class="blog-sidebar">
    <p class="sidebar-header">@lang('client.blog-sidebar.header')</p>

    <div class="info-block-cont">
        <div class="text-cont">
            @lang('client.blog-sidebar.text-content')
        </div>
    </div>

    <a href="/" class="skew-right gl-yellow-btn order-form-btn">
        <span class="skew-left">@lang('client.blog-sidebar.project_price')</span>
    </a>

    <hr class="inclined-line-1">

    <p class="sidebar-header">@lang('client.blog-sidebar.our_work')</p>

    <div class="our-works-blog">
        <div class="portfolio-item">
            <a href="portfolio-material.html" class="link-to-portfolio"></a>
        </div>
        <div class="portfolio-item">
            <a href="portfolio-material.html" class="link-to-portfolio"></a>
        </div>
        <div class="portfolio-item">
            <a href="portfolio-material.html" class="link-to-portfolio"></a>
        </div>
        <div class="portfolio-item">
            <a href="portfolio-material.html" class="link-to-portfolio"></a>
        </div>
    </div>

    <a href="{{ route('client.portfolio.index') }}" class="skew-right gl-yellow-btn">
        <span class="skew-left">@lang('client.portfolio-block-small.show_all')</span>
    </a>

    <hr class="inclined-line-2">

    <p class="sidebar-header">@lang('client.blog-sidebar.follow_us')</p>

    <div class="kinesko-widgets">
        <!-- youtube widget -->
        <div class="g-ytsubscribe" data-channel="GoogleDevelopers" data-layout="default" data-count="default"></div>
    </div>
</div>
<!-- end of blog-sidebar -->