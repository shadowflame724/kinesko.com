<!-- start of portfolio-block-small -->
<div class="portfolio-block-small triangle-left">
    <div class="container">
        <h3 class="section-header black-color">@lang('client.portfolio-block-small.title')</h3>
    </div>

    <div class="portfolio-items-cont">
        @foreach($portfolioFooter as $value)
        <div class="portfolio-item-cont">
            <div class="portfolio-item">
                <div class="poster-img-cont">
                    <img src="/storage/{{ $value->image_thumb }}" alt="{{ $value->image_thumb_alt }}">
                </div>
                <div class="hover-layer" style="color: #000;">
                    <h3 class="portfolio-name">
                        {{ $value->{'title' . $langSuf} }}
                    </h3>
                    <p class="portfolio-category">
                        <a class="link-to-category" href="{{ route('client.portfolio.index', ['portfolio' => $value->categorySlug]) }}">
                            {{ $value->{'categoryName' . $langSuf} }}
                        </a>
                    </p>
                    <a href="{{ route('client.portfolio.index', ['portfolio' => $value->categorySlug]) }}" class="skew-right gl-transparent-btn white-border go-portfolio-btn">
                        <span class="skew-left">@lang('client.portfolio-block-small.go')</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach


        <div class="view-cont bg-cont">
            <a href="{{ route('client.portfolio.index') }}" class="skew-right gl-transparent-btn view-portfolio-btn">
                <span class="skew-left">@lang('client.portfolio-block-small.show_all')</span>
            </a>
        </div>

    </div>

    <div class="order-cont">
        <a href="/" class="skew-right gl-yellow-btn order-form-btn">
            <span class="skew-left">@lang('client.general.make_request')</span>
        </a>
    </div>

</div>
<!-- end of portfolio-block-small -->