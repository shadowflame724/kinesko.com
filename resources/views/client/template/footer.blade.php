<!-- start of our-managers -->
<section class="our-managers bg-cont">
    <div class="dark-mask"></div>
    <div class="container">
        <h3 class="section-header white-color">@lang('client.footer.creating_graphic_clips')</h3>

        <div class="managers-cont">
            @foreach($managers as $manager)
                <div class="manager-item">
                    <div class="manager-photo">
                        <img src="{{ url('storage/'.$manager->image) }}" alt="photo-gema">
                    </div>
                    <div class="manager-contacts">
                        <p class="manager-name">{{ $manager->{'name' . $langSuf} }}</p>
                        <p class="manager-post">{{ $manager->{'post' . $langSuf} }}</p>

                        <p class="manager-phone">
                            <a href="tel:{{ $manager->phone }}">{{ $manager->phone }}</a>
                        </p>
                        <p class="manager-phone">
                            <a href="tel:{{ $manager->add_phone }}">{{ $manager->add_phone }}</a>
                        </p>
                        <p class="manager-email">
                            <a href="mailto:{{ $manager->email }}">{{ $manager->email }}</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="/" class="skew-right gl-transparent-btn order-form-btn">
            <span class="skew-left">@lang('client.footer.make_request')</span>
        </a>
    </div>
    <!--<div class="img-cont footer-yellow-rectangle">-->
    <!--<img src="/images/general/footer-yellow-rectangle.svg" alt="footer-bg">-->
    <!--</div>-->

    <img class="footer-bg-rectangle" src="/images/general/footer-yellow-black-rectangle.svg" alt="footer-bg">

    <!--<div class="bg-cont footer-bg-rectangle"></div>-->
</section>
<!-- end of our-managers -->

<!-- start of footer -->
<footer>
    <div class="container">
        <div class="footer-columns">
            <div class="footer-col">
                <div class="img-cont logo-cont">
                    <a href="{{ route('client.index') }}" target="_self">
                        <img src="/images/general/logo-kinesko.svg" alt="logo-kinesko-icon">
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <p class="col-name">@lang('client.menu.contacts')</p>

                <div class="contact-info">
                    <p class="contact-telephone">
                        <a href="tel:{{ setting('site.main_phone') }}">{{ setting('site.main_phone') }}</a>
                    </p>

                    <p class="contact-email">
                        <a href="mailto:{{ setting('site.main_email') }}">{{ setting('site.main_email') }}</a>
                    </p>
                </div>

                <div class="contact-info">
                    <p class="contact-address">@lang('client.general.address')</p>
                </div>

                <div class="contact-info">
                    <p class="shedule"><span>@lang('client.general.work_days')</span>@lang('client.general.work_hours')</p>
                    <p class="shedule"><span>@lang('client.general.weekend_days')</span>@lang('client.general.weekend')</p>
                </div>

            </div>
            <div class="footer-col">
                <p class="col-name">@lang('client.footer.soc_net')</p>
                <div class="social-links">
                    <a href="{{ setting('site.google_link') }}" target="_blank">
                        <span class="icon-cont">
                            <i class="icon icon-google"></i>
                            <i class="icon icon-hover icon-google-hover"></i>
                        </span>
                    </a>
                    <a href="{{ setting('site.twitter_link') }}" target="_blank">
                        <span class="icon-cont">
                            <i class="icon icon-twitter"></i>
                            <i class="icon icon-hover icon-twitter-hover"></i>
                        </span>
                    </a>
                    <a href="{{ setting('site.vk_link') }}" target="_blank">
                        <span class="icon-cont">
                            <i class="icon icon-vk"></i>
                            <i class="icon icon-hover icon-vk-hover"></i>
                        </span>
                    </a>
                    <a href="{{ setting('site.rss_link') }}" target="_blank">
                        <span class="icon-cont">
                            <i class="icon icon-rss"></i>
                            <i class="icon icon-hover icon-rss-hover"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <a href="/" class="skew-right gl-yellow-btn callback-form-btn">
                    <span class="skew-left">@lang('client.menu.contact_manager')</span>
                </a>
            </div>
        </div>
        <p class="copy-right">
            &copy; 2010 - {{ \Carbon\Carbon::now()->format('Y') }} @lang('client.footer.slogan')
        </p>
    </div>
</footer>
<!-- end of footer -->

<!-- arrows UP and SEARCH start -->
<button class="back-to-top skew-left">
    <a href="#" class="skew-right">
        <div class="up-icon">
            <i class="icon icon-up"></i>
            <i class="icon icon-up-hover"></i>
        </div>
    </a>
</button>

<div class="search-container">
    <form class="search-form" action="{{ route('client.search') }}">
        <div class="input-container skew-right">
            <input class="skew-left" type="text" name="query" placeholder="@lang('client.general.search')" required autofocus>
        </div>
        <button type="submit" class="search-btn skew-right">
            <div class="search-icon skew-left">
                <i class="icon icon-search"></i>
                <i class="icon icon-search-hover"></i>
            </div>
        </button>
    </form>
</div>
<!-- arrows UP and SEARCH end -->