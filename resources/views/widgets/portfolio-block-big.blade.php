<!-- start of portfolio-block-big -->
<div class="portfolio-block-big portfolio-cont">
    <div class="left-block bg-cont">
        <div class="gl-container">
            <h3 class="block-header">@lang('client.menu.portfolio')</h3>
            <p class="block-title">@lang('client.portfolio-block-big.title')</p>
            <a href="{{ route('client.portfolio.index') }}" class="skew-right gl-transparent-btn white-border view-portfolio-btn">
                <span class="skew-left">@lang('client.portfolio-block-big.show_all')</span>
            </a>
        </div>
    </div>
    <div class="right-block">
        <div class="portfolio-items-cont">
            @foreach($portfolioWidget as $value)
                <div class="portfolio-item-cont">
                    <div class="portfolio-item">
                        <div class="poster-img-cont">
                            <img src="{{ url('storage/' . $value->image_thumb) }}" alt="{{ $value->image_thumb_alt }}">
                        </div>
                        <div class="hover-layer" style="color: #000;">
                            <h3 class="portfolio-name">
                                {{ $value->{'title' . $langSuf} }}
                            </h3>
                            <p class="portfolio-category">
                                <a class="link-to-category" href="{{ route('client.portfolio.category', ['portfolio' => $value->category->slug]) }}">
                                    {{ $value->category->{'title' . $langSuf} }}
                                </a>
                            </p>
                            <a href="{{ route('client.portfolio.show', ['category' => $value->category->slug, 'portfolio' => $value->slug]) }}" class="skew-right gl-transparent-btn white-border go-portfolio-btn">
                                <span class="skew-left">@lang('client.general.go_to')</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="order-cont bg-cont">
                <p class="slogan">@lang('client.portfolio-block-big.wonderful_designers')</p>
                <a href="/" class="skew-right gl-transparent-btn order-form-btn">
                    <span class="skew-left">@lang('client.general.make_request')</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end of portfolio-block-big -->