@extends('client.template.layout')

@section('page-title', $post->{'seo_title' . $langSuf})
@section('page-description', $post->{'meta_description' . $langSuf})
@section('page-keywords', $post->{'meta_keywords' . $langSuf})

@section('page-style')
    <link rel="stylesheet" href="/css/libs/star-rating.css"> <!-- star-rating.css -->
    <link rel="stylesheet" href="/css/libs/flexslider.css"> <!-- flexslider.css -->
@stop

@section('content')

    <!-- start of blog-materials -->
    <section id="blog-materials">

        <!-- start of blog-material -->
        <section class="blog-material">
            <div class="main-top-container bg-cont" style="background-image: url('/storage/{{ $post->image }}');">
                <div class="dark-mask"></div>
                <div class="container">
                    <div class="page-head">
                        <div class="bread-crumbs">
                            <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                            <a href="{{ route('client.blog.index') }}">@lang('client.menu.blog')</a>
                            <span class="active">{{ $post->category->{'title' . $langSuf} }}</span>
                        </div>
                        <h1 class="page-title">
                            {{ $post->{'title' . $langSuf} }}
                        </h1>
                    </div>

                    <div class="material-general-info">
                        <p class="material-date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="blog-container triangle-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-material-cont">
                                <!-- start of author-block -->
                                <div class="author-block">
                                    <div class="author-img">
                                        <img src="/storage/{{ $post->author->avatar }}" alt="author-img">
                                    </div>
                                    <div class="author-info">
                                        <p class="name">@lang('client.blog.show_author') :
                                            <a class="link-to-author"
                                               href="{{ route('client.blog.author', ['user' => $post->author->slug ]) }}"
                                               title="@lang('client.blog.author_page')">
                                                {{ $post->author->{'name' . $langSuf} }}
                                            </a>
                                        </p>
                                        <p class="specialty">@lang('client.blog.show_position') :
                                            <span>
                                            {{ $post->author->{'position' . $langSuf} }}
                                        </span>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of author-block -->
                            {!! $post->{'body_1' . $langSuf} !!}

                            <!-- start of blog-items -->
                                <div class="blog-items clearfix">
                                    @foreach($similarPosts as $similarPost)

                                        <div class="col-sm-6 blog-item-wrapper">
                                            <div class="blog-item">
                                                <div class="top-cont">
                                                    <a class="link-to-material" href="{{ route('client.blog.show', ['category' => $similarPost->category->slug, 'post' => $similarPost->slug]) }}">
                                                        <div class="bg-cont" style="background-image: url('/storage/'{{ $similarPost->image_thumb }})"></div>
                                                    </a>
                                                </div>
                                                <div class="bottom-cont">
                                                    <div class="material-info">
                                                        <span class="material-date">{{ $similarPost->created_at->formatLocalized('%d %B %Y') }}</span>
                                                        <span class="material-author">
                                        <a class="link-to-author" href="{{ route('client.blog.author', ['author' => $similarPost->author->slug]) }}" title="@lang('client.blog.author_page')">
                                            {{ $similarPost->author->{'name' . $langSuf} }}
                                        </a>
                                    </span>
                                                    </div>
                                                    <h3 class="material-title">
                                                        <a class="link-to-material" href="{{ route('client.blog.show', ['category' => $similarPost->category->slug, 'post' => $similarPost->slug]) }}">
                                                            {{ $similarPost->{'title' . $langSuf} }}
                                                        </a>
                                                    </h3>
                                                    <p class="material-text">
                                                        {{ $similarPost->{'description' . $langSuf} }}
                                                    </p>
                                                    <a class="material-category-link" href="{{ route('client.blog.category', ['category' => $similarPost->category->slug]) }}">{{ $similarPost->category->{'title' . $langSuf} }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            {!! $post->{'body_2' . $langSuf} !!}

                            <!-- start of contact-info, will be SIMILAR on ALL blog-material-pages!!!  -->
                                <div class="contact-info">
                                    <p><span>@lang('client.general.contact_info'):</span></p>
                                    <p class="tel">{{ setting('main_phone') }}</p>
                                    <p class="email">
                                        <a href="mailto:{{ setting('main_email') }}">{{ setting('main_email') }}</a>
                                    </p>
                                </div>
                                <!-- end of contact-info -->

                                <!-- !!! TO DO: turn on star-rating module !!! -->
                                <!-- start of star-rating-cont -->
                                <div class="star-rating-cont">
                                    <div class="star-rating">
                                        <input class="rating"
                                               value="@if($post->rating == 0){{ $post->rating }}@else{{ $post->rating / $post->votes}}@endif"
                                               type="number">
                                    </div>
                                    <p class="voices-count">голосов - <span>{{ $post->votes }}</span></p>
                                </div>
                                <!-- end of star-rating-cont -->

                                <!-- start of author-block -->
                                <div class="author-block">
                                    <div class="author-img">
                                        <img src="/storage/{{ $post->author->avatar }}" alt="author-img">
                                    </div>
                                    <div class="author-info">
                                        <p class="name">@lang('client.blog.show_author') :
                                            <a class="link-to-author"
                                               href="{{ route('client.blog.author', ['user' => $post->author->id ]) }}"
                                               title="@lang('client.blog.author_page')">
                                                {{ $post->author->{'name' . $langSuf} }}
                                            </a>
                                        </p>
                                        <p class="specialty">@lang('client.blog.show_position') :
                                            <span>
                                            {{ $post->author->{'position' . $langSuf} }}
                                        </span>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of author-block -->

                                <!-- start of comments-block -->
                                <div class="comments-block">
                                    <!-- add HyperComments widget with the same ID as on KLONA -->
                                    <div class="hypercomments">
                                        <div id="hypercomments_widget"></div>
                                        <script type="text/javascript">
                                            _hcwp = window._hcwp || [];
                                            _hcwp.push({widget: "Stream", widget_id: 73852, hc_disable: 1});
                                            (function () {
                                                if ("HC_LOAD_INIT" in window) return;
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

                        <div class="col-lg-4">
                            <div class="blog-sidebar-wrapper">
                                {{--//= template/blog-sidebar.html--}}
                                {{--@include('client.template.blog-sidebar')--}}
                                @widget('BlogSideBar')
                                <!-- start of blog-subscribe-form -->
                                <form class="blog-subscribe-form">
                                    <div class="gl-container">
                                        <p class="form-header">@lang('client.forms.subscribe_header')</p>
                                        <p class="form-header-small">@lang('client.forms.subscribe_header_small')</p>

                                        <div class="input-wrapper">
                                            <div class="input-cont skew-right">
                                                <input type="text" name="name" required="required"
                                                       class="user-name skew-left"
                                                       placeholder="@lang('client.forms.name')" tabindex="1">
                                            </div>
                                        </div>

                                        <div class="input-wrapper">
                                            <div class="input-cont skew-left">
                                                <input type="email" name="email" required="required"
                                                       class="user-email skew-right"
                                                       placeholder="@lang('client.forms.email')" tabindex="2">
                                            </div>
                                        </div>

                                        <button type="submit" class="skew-right gl-yellow-btn submit-btn" tabindex="3">
                                            <span class="skew-left">@lang('client.forms.subscribe_subscribe')</span>
                                        </button>
                                    </div>
                                </form>
                                <!-- end of blog-subscribe-form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--//= template/our-materials.html--}}
            {{--@include('client.template.our-materials')--}}
            @widget('OurMaterial')

        </section>
        <!-- end of blog-material -->

        <!-- start of material-img-preview -->
        <div id="material-img-preview">
            <div class="dark-mask"></div>
            <img class="full-img" src="" alt="full-img">
        </div>
        <!-- end of material-img-preview -->

    </section>
    <!-- end of blog-materials -->
@stop

<!-- scripts only for blog-material pages -->
@section('page-scripts')
    <script src="/js/libs/star-rating.js"></script>
    <script src="/js/libs/jquery.flexslider.js"></script>

    <!-- youtube widget script -->
    <script src="https://apis.google.com/js/platform.js"></script>

    <script>
        $(function () {
            $(".content-list li a[href^='#']").click(function (e) {
                var el = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: ($(el).offset().top - 30)
                }, 1000);
                return false;
            });

            $(".flexslider .slides li").each(function (i, item) {
                $(item).attr("data-thumb", $(item).find("img").attr("src"))
            });

            $('.flexslider').flexslider({
                animation: "fade",
                controlNav: "thumbnails",
                easing: "swing"
            });
        });
    </script>
    @php($data = [
         'type' => 'post',
         'id' => $post->id
         ])
    {{--// start of star-rating initialization--}}
    @include('client.template._js_star-rating')
    {{--// end of of star-rating initialization--}}
@stop