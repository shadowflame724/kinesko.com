<!-- start of header -->
<header>
    <div class="container">
        <div class="img-cont logo-cont">
            <a href="{{ route('client.index') }}" target="_self">
                <img src="/images/general/logo-kinesko.svg" alt="logo-kinesko-icon">
            </a>
        </div>

        <div class="menu-btn-cont">
            <div class="menu-btn">
                <div class="first"></div>
                <div class="second"></div>
                <div class="third"></div>
            </div>
        </div>


        <nav class="main-menu">
            <ul>
                <li class="header-contacts">
                    <span class="tel">
                        <a href="tel:{{ setting('site.main_phone') }}">{{ setting('site.main_phone') }}</a>
                    </span>
                    <span class="email">
                        <a href="mailto:{{ setting('site.main_email') }}">{{ setting('site.main_email') }}</a>
                    </span>
                </li>
                <li class="nav-btn mobile-hidden">
                    <a href="/" class="skew-right gl-yellow-btn callback-form-btn">
                        <span class="skew-left">@lang('client.menu.contact_manager')</span>
                    </a>
                </li>
                <li><a href="{{ route('client.index') }}" class="menu-item active">@lang('client.menu.index')</a></li>
                <li><a href="{{ route('client.services.index') }}" class="menu-item">@lang('client.menu.services')</a></li>
                <li><a href="{{ route('client.portfolio.index') }}" class="menu-item">@lang('client.menu.portfolio')</a></li>
                <li><a href="{{ route('client.blog.index') }}" class="menu-item">@lang('client.menu.blog')</a></li>
                <li><a href="{{ route('client.company') }}" class="menu-item">@lang('client.menu.company')</a></li>
                <li><a href="{{ route('client.contacts') }}" class="menu-item">@lang('client.menu.contacts')</a></li>

                <li class="language">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" @if(LaravelLocalization::getCurrentLocale() == $localeCode) class="active" @endif hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $localeCode }}
                        </a>
                    @endforeach
                </li>

                <li class="nav-btn mobile-visible">
                    <a href="/" class="skew-right gl-yellow-btn callback-form-btn">
                        <span class="skew-left">@lang('client.menu.contact_manager')</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</header>
<!-- end of header -->