@extends('client.template.layout')

@section('page-title', 'Kinesko - блог')

@section('page-style')
    <link rel="stylesheet" href="/css/libs/star-rating.css"> <!-- star-rating.css -->
@stop

@section('content')

<!-- start of author-page -->
<section id="author-page">
    <div class="main-top-container bg-cont">
        <!--<div class="dark-mask"></div>-->
        <div class="container">
            <div class="page-head">
                <div class="bread-crumbs">
                    <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                    <a href="{{ route('client.blog.index') }}">@lang('client.menu.blog')</a>
                    <span class="active">@lang('client.blog.author_page')</span>
                </div>
                <h1 class="page-title">@lang('client.blog.author_page')</h1>
            </div>

        </div>
    </div>

    <div class="blog-container triangle-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- start of author-block -->
                    <div class="author-block">
                        <div class="author-img">
                            <img src="/storage/{{ $user->avatar }}" alt="author-img">
                        </div>
                        <div class="author-info">
                            <p class="name">{{ $user->{'name' . $langSuf} }}</p>
                            <div class="rating-views-cont">
                                <div class="star-rating-cont">
                                    <p class="cont-title">общий рейтинг</p>
                                    <div class="star-rating">
                                        <input class="rating" value="4" type="number">
                                    </div>
                                    <p class="voices-count"><span>99999</span> голосов </p>
                                </div>

                                <div class="views-cont">
                                    <p class="cont-title">100 500 общих просмотров</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of author-block -->

                    <h3 class="section-header black-color">все статьи автора</h3>

                    <div class="blog-items">
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="{{ route('client.blog.author', ['user' => $user->slug]) }}" title="страница автора">
                                            {{ $user->{'name' . $langSuf} }}
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="blog-material.html">
                                            Пятилетие в стиле 90х:  в стиле 90х Пятилетие
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="blog-author.html" title="страница автора">
                                            Алексей Мельниченко
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="blog-material.html">
                                            Пятилетие в стиле 90х:  в стиле 90х Пятилетие
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="blog-author.html" title="страница автора">
                                            Алексей Мельниченко
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="blog-material.html">
                                            Пятилетие в стиле 90х:  в стиле 90х Пятилетие
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="blog-author.html" title="страница автора">
                                            Алексей Мельниченко
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="blog-material.html">
                                            Пятилетие в стиле 90х:  в стиле 90х Пятилетие
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="blog-author.html" title="страница автора">
                                            Алексей Мельниченко
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="blog-material.html">
                                            Пятилетие в стиле 90х:  в стиле 90х Пятилетие
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="blog-author.html" title="страница автора">
                                            Алексей Мельниченко
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="blog-material.html">
                                            Пятилетие в стиле 90х:  в стиле 90х Пятилетие
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-sidebar-wrapper">
                        {{--//= template/blog-sidebar.html--}}
                        @include('client.template.blog-sidebar')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <ul class="blog-pagination">
        <li class="active">
            <span>{{ setting('admin.loader') }}</span>
        </li>
        <li>
            <a href="#">2</a>
        </li>
        <li>
            <a href="#">3</a>
        </li>
        <li>
            <a href="#">4</a>
        </li>
        <li>
            <a href="#">5</a>
        </li>
        <li>
            <a href="#">></a>
        </li>
        <li>
            <a href="#">>></a>
        </li>
    </ul>

</section>
<!-- end of author-page -->
@stop

@section('page-scripts')
<script src="/js/libs/star-rating.js"></script>

<!-- youtube widget script -->
<script src="https://apis.google.com/js/platform.js"></script>

<script>
    // start of star-rating initialization
    $(".rating").rating({min: 1, max: 5, step: 0.5, size: 'sm'});
    $('.clear-rating').hide();
    $('.caption').hide();
    // end of of star-rating initialization
</script>
@stop