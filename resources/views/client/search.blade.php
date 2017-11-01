@extends('client.template.layout')

@section('page-title', 'Kinesko - страница результата поиска')

@section('page-style')
    <link rel="stylesheet" href="/css/libs/star-rating.css"> <!-- star-rating.css -->
@stop

@section('content')

<!-- start of search-result -->
<section id="search-result">
    <div class="main-top-container bg-cont">
        <!--<div class="dark-mask"></div>-->
        <div class="container">
            <div class="page-head">
                <p class="search-title">Результаты поиска по запросу</p>
                <h1 class="page-title">"анимационные Ролики"</h1>
            </div>

        </div>
    </div>

    <div class="blog-container triangle-left">
        <div class="container">
            <div class="row">

                <!-- start of search-result-form -->
                <form class="search-result-form">

                    <div class="inputs-container">

                        <div class="left-cont">
                            <div class="input-box-wrapper text-box-wrapper">
                                <div class="input-box">
                                    <input type="text" name="search-text" required="required" class="search-text"
                                           placeholder="Поиск" tabindex="1">
                                </div>
                            </div>

                            <div class="input-box-wrapper category-box-wrapper">
                                <div class="input-box">
                                    <select name="category" class="search-category" tabindex="4">
                                        <option value disabled>Выберите категорию</option>
                                        <option value="all" selected>Все</option>
                                        <option value="portfolio">Портфолио</option>
                                        <option value="blog">Блог</option>
                                        <option value="services">Услуги</option>
                                    </select>
                                    <!--<div class="fake-block"></div>-->
                                </div>
                            </div>

                            <div class="checkboxes-container">
                                <div class="checkbox-item">
                                    <input id="checkbox-in-header" type="checkbox" name="search-condition"
                                           value="in-header" tabindex="2">
                                    <label for="checkbox-in-header"><span>в заголовке</span></label>
                                </div>
                                <div class="checkbox-item">
                                    <input id="checkbox-in-text" type="checkbox" name="search-condition"
                                           value="in-text" checked="checked" tabindex="3">
                                    <label for="checkbox-in-text"><span>в тексте</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="right-cont">
                            <button type="submit" class="skew-right gl-yellow-btn search-submit-btn" tabindex="3">
                                <span class="skew-left">поиск</span>
                            </button>
                        </div>

                    </div>
                </form>
                <!-- end of search-result-form -->

                <div class="col-lg-8">
                    <div class="blog-items">
                        <!-- here can be 3 search results: blog-material, portfolio-material and service-material;
                            their graphic templates are similar - so they are contained to the "blog-item-wrapper"
                            container (that is used on blog pages). You should only to determine (when get search
                            result from data base) - which information for block is necessary or unnecessary !!!)
                         -->
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
                                    <a class="link-to-material" href="portfolio-material.html">
                                        <div class="bg-cont" style="background-image: url('images/general/portfolio-2.jpg')"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="portfolio.html" title="страница портфолио">
                                            портфолио
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="portfolio-material.html">
                                            Видео для М1
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно,
                                        <span>анимационные ролики</span>! Особенно, если это годовщина существования
                                        нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="portfolio.html">2D АНИМАЦИИ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="service-material.html">
                                        <div class="bg-cont" style="background-image: url('images/general/kinesko-main-bg.jpg')"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-author">
                                        <a class="link-to-author" href="services.html" title="страница услуг">
                                            услуги
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="service-material.html">
                                            Создание анимационных роликов
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="services.html">РАЗРАБОТКА РЕКЛАМНОЙ СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="portfolio-material.html">
                                        <div class="bg-cont" style="background-image: url('images/general/portfolio-4.jpg')"></div>
                                    </a>
                                </div>
                                <div class="bottom-cont">
                                    <div class="material-info">
                                        <span class="material-date">08:43, Июн 26, 2017</span>
                                        <span class="material-author">
                                        <a class="link-to-author" href="portfolio.html" title="страница портфолио">
                                            портфолио
                                        </a>
                                    </span>
                                    </div>
                                    <h3 class="material-title">
                                        <a class="link-to-material" href="portfolio-material.html">
                                            STEAMPUNK АНИМАЦИЯ
                                        </a>
                                    </h3>
                                    <p class="material-text">
                                        Мы весьма радужно проводим наши корпоративы. Особенно, если это годовщина
                                        существования нашей любимой студии!
                                    </p>
                                    <a class="material-category-link" href="portfolio.html">ВИДЕО И МОУШН ДИЗАЙН</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-wrapper">
                            <div class="blog-item">
                                <div class="top-cont">
                                    <a class="link-to-material" href="blog-material.html">
                                        <div class="bg-cont" style="background-image: url('images/services/service-image-1.jpg')"></div>
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
            <span>1</span>
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
<!-- end of search-result -->
@stop

@section('page-scripts')
<!-- youtube widget script -->
<script src="https://apis.google.com/js/platform.js"></script>
@stop