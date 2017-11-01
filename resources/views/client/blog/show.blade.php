@extends('client.template.layout')

@section('page-title', 'Kinesko - блог')

@section('page-style')
    <link rel="stylesheet" href="/css/libs/star-rating.css"> <!-- star-rating.css -->
    <link rel="stylesheet" href="/css/libs/flexslider.css"> <!-- flexslider.css -->
@stop

@section('content')

    <!-- start of blog-materials -->
    <section id="blog-materials">

        <!-- start of blog-material -->
        <section class="blog-material">
            <div class="main-top-container bg-cont" style="background-image: url(/storage/{{ $post->image }});">
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
                        <p class="material-date">{{ $post->created_at }}</p>
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
                                        <p class="name">Автор :
                                            <a class="link-to-author" href="{{ route('client.blog.author', ['user' => $post->author->id ]) }}" title="страница автора">
                                                {{ $post->author->name }}
                                            </a>
                                        </p>
                                        <p class="specialty">Специальность :
                                            <span>
                                            Front-End Developer
                                        </span>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of author-block -->
                                <p>
                                    Девальвация гривны, политическая ситуация и рост цен – основные
                                    факторы изменения спроса на товары общего употребления, в первую
                                    очередь – продукты питания. Маркетинговые исследования спроса показывают
                                    общее благосостояние нации и вектор развития страны.
                                </p>
                                <ul class="content-list">
                                    <li>
                                        <a href="#content-1">Тенденция №1: падение спроса на продукты питания первой
                                            необходимости</a>
                                    </li>
                                    <li>
                                        <a href="#content-2">Тенденция №2: «заедание» проблем - увеличении спроса на
                                            товары с высокой калорийность</a>
                                    </li>
                                    <li>
                                        <a href="#content-3">Тенденция №3: «наедание» болезней - вредная тенденция среди
                                            потребителей Украины</a>
                                    </li>
                                    <li>
                                        <a href="#content-4">Резюме</a>
                                    </li>
                                </ul>
                                <p>
                                    <span>Девальвация гривны, политическая ситуация и рост цен </span>– основные
                                    факторы изменения спроса на товары общего употребления, в первую
                                    очередь – продукты питания. Маркетинговые исследования спроса показывают
                                    общее благосостояние нации и вектор развития страны. Кроме того,
                                    <span>исследование отношения потребителей к разным товарным группам –
                                важный инструмент построения ритейл-брендинга компании в сфере
                                АПК и продуктового хозяйства. Своевременное выявления падение
                                спроса на продукты питания позволяет скорректировать маркетинговую
                                    стратегию и позиционирование бренда.</span>
                                </p>
                                <p>
                                    Мы провели исследование предпочтений потребителей рынка продуктовых
                                    товаров и выделили 6 тенденций потребителей Украины.
                                </p>
                                <div class="special-text question-text">
                                    <div class="special-text-inner">
                                        <p>
                                            Для того чтобы заказать анализ потребителей продуктов питания
                                            Украины обратитесь в компанию KOLORO. Наш менеджер проведет
                                            бесплатную консультацию. Контактная информация: +38 044 223 51 20.
                                            Для того чтобы заказать анализ потребителей продуктов питания
                                            Украины обратитесь в компанию KOLORO. Наш менеджер проведет
                                        </p>
                                    </div>
                                </div>
                                <h2 id="content-1">Тенденция №1: падение спроса на продукты питания первой
                                    необходимости</h2>
                                <ol>
                                    <li>В 2015 году среди украинских потребителей зафиксировано падения покупательной.
                                    </li>
                                    <li>Причиной этому послужил рост потребительских цен на 43,3% за 2015 год.</li>
                                    <li>Рекордно поднялась стоимость на необходимые и полезные продукты – овощи (на
                                        67,7%).
                                    </li>
                                </ol>
                                <p>
                                    Мы провели исследование предпочтений потребителей рынка продуктовых
                                    товаров и выделили 6 тенденций потребителей Украины.
                                </p>
                                <div class="special-text attention-text">
                                    <div class="special-text-inner">
                                        <p>
                                            Для того чтобы заказать анализ потребителей продуктов питания
                                            Украины обратитесь в компанию KOLORO. Наш менеджер проведет
                                            бесплатную консультацию. Контактная информация: +38 044 223 51 20.
                                            Для того чтобы заказать анализ потребителей продуктов питания
                                            Украины обратитесь в компанию KOLORO. Наш менеджер проведет
                                        </p>
                                    </div>
                                </div>
                                <p>
                                    Согласно последним прогнозам, цены на продукты питания могут подняться
                                    еще на 40% до конца 2016 года. Пока что основной сдерживающий фактор
                                    роста цен – низкая покупательная способность. На продукты, к которым
                                    украинцы уже потеряли интерес, производители не смогут повысить цены.
                                    Например, на свинину спрос упал, и цены практически не двигаются.
                                    Одновременно с этим вырос спрос на бюджетное мясо – курятину, что
                                    повлияло на рост цен в данном сегменте.
                                </p>
                                <!-- start of blog-items -->
                                <div class="blog-items clearfix">
                                    <div class="col-sm-6 blog-item-wrapper">
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
                                                        Пятилетие в стиле 90х: в стиле 90х Пятилетие
                                                    </a>
                                                </h3>
                                                <p class="material-text">
                                                    Мы весьма радужно проводим наши корпоративы. Особенно, если это
                                                    годовщина
                                                    существования нашей любимой студии!
                                                </p>
                                                <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ
                                                    СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 blog-item-wrapper">
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
                                                        Пятилетие в стиле 90х: в стиле 90х Пятилетие
                                                    </a>
                                                </h3>
                                                <p class="material-text">
                                                    Мы весьма радужно проводим наши корпоративы. Особенно, если это
                                                    годовщина
                                                    существования нашей любимой студии!
                                                </p>
                                                <a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ
                                                    СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of blog-items -->
                                <h2 id="content-2">Тенденция №2: «заедание» проблем - увеличении спроса на товары с
                                    высокой калорийность</h2>
                                <ul>
                                    <li>В 2015 году среди украинских потребителей зафиксировано падения покупательной.
                                    </li>
                                    <li>Причиной этому послужил рост потребительских цен на 43,3% за 2015 год.</li>
                                    <li>Рекордно поднялась стоимость на необходимые и полезные продукты – овощи (на
                                        67,7%).
                                    </li>
                                </ul>
                                <h2 id="content-3">Тенденция №3: «наедание» болезней - вредная тенденция среди
                                    потребителей Украины</h2>
                                <p>
                                    Питание – это фактор, который на 50% определяет состояние здоровья.
                                    А здоровье украинцев тает на глазах – потребление необходимых и
                                    полезных продуктов питания отстает от медицинских рекомендованных
                                    норм на 40-60%. Только за 2015 год уровень потребления мяса упал
                                    до 56 кг/год при норме в 80 кг. Молочных продуктов стали есть
                                    на 41% ниже нормы, фруктов и ягод – на 42%, рыбы – на 45%. А того
                                    же хлеба – на 7% больше, картофеля – на 14%.
                                </p>

                                <!-- start of blog-slider -->
                                <div class="flexslider">
                                    <ul class="slides">
                                        <div class="share-btn">
                                            <a href="#" class="gl-yellow-btn skew-right">
                                                <span class="skew-left">+ поделиться</span>
                                            </a>
                                        </div>
                                        <li data-thumb="/images/blog-material/blog-image-slide-1.jpg">
                                            <img src="/images/blog-material/blog-image-slide-1.jpg"
                                                 alt="blog-slider-img">
                                        </li>
                                        <li data-thumb="/images/blog-material/blog-image-slide-2.jpg">
                                            <img src="/images/blog-material/blog-image-slide-2.jpg"
                                                 alt="blog-slider-img">
                                        </li>
                                        <li data-thumb="/images/blog-material/blog-image-slide-3.jpg">
                                            <img src="/images/blog-material/blog-image-slide-3.jpg"
                                                 alt="blog-slider-img">
                                        </li>
                                        <li data-thumb="/images/blog-material/blog-image-slide-4.jpg">
                                            <img src="/images/blog-material/blog-image-slide-4.jpg"
                                                 alt="blog-slider-img">
                                        </li>
                                    </ul>
                                </div>
                                <!-- end of blog-slider -->

                                <h2 id="content-4">Резюме</h2>
                                <p>
                                <span>Рост цен и девальвация гривны привели к падению покупательной способности
                                    украинцев. В первую очередь они стали приобретать меньше необходимых и
                                полезных продуктов в эконом-сегменте.</span> В это же время увеличился разрыв
                                    между средним ценовым сегментом и премиум-классом. Состоятельные украинцы
                                    покупают больше и лучше, когда малообеспеченные слои населения едва
                                    выдерживают строгую диету. Осознанность украинцев и желание поддерживать
                                    устойчивое развитие привели к росту спроса на органические продукты и local food.
                                </p>
                                <p>
                                    Обратитесь в компанию KOLORO и закажите исследование потребителей
                                    продуктов питания интересующей вас категории. Срок проведения маркетингового
                                    исследования составляет 14 дней и обеспечит вас наиболее полной
                                    информацией о состоянии рынка.
                                </p>

                                <!-- start of contact-info, will be SIMILAR on ALL blog-material-pages!!!  -->
                                <div class="contact-info">
                                    <p><span>Контактная информация:</span></p>
                                    <p class="tel">+38 044 223 51 20</p>
                                    <p class="email">
                                        <a href="mailto:info@kinesko.ua">info@kinesko.ua</a>
                                    </p>
                                </div>
                                <!-- end of contact-info -->

                                <!-- !!! TO DO: turn on star-rating module !!! -->
                                <!-- start of star-rating-cont -->
                                <div class="star-rating-cont">
                                    <div class="star-rating">
                                        <input class="rating" value="3" type="number">
                                    </div>
                                    <p class="voices-count"><span>99999</span> голосов </p>
                                </div>
                                <!-- end of star-rating-cont -->

                                <!-- start of author-block -->
                                <div class="author-block">
                                    <div class="author-img">
                                        <img src="/storage/{{ $post->author->avatar }}" alt="author-img">
                                    </div>
                                    <div class="author-info">
                                        <p class="name">Автор :
                                            <a class="link-to-author" href="{{ route('client.blog.author', ['user' => $post->author->id ]) }}" title="страница автора">
                                                {{ $post->author->name }}
                                            </a>
                                        </p>
                                        <p class="specialty">Специальность :
                                            <span>
                                            Front-End Developer
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
                                    @include('client.template.blog-sidebar')
                                <!-- start of blog-subscribe-form -->
                                <form class="blog-subscribe-form">
                                    <div class="gl-container">
                                        <p class="form-header">Понравилась статья?</p>
                                        <p class="form-header-small">Подписывайтесь на наши обновления</p>

                                        <div class="input-wrapper">
                                            <div class="input-cont skew-right">
                                                <input type="text" name="name" required="required"
                                                       class="user-name skew-left"
                                                       placeholder="Ваше имя" tabindex="1">
                                            </div>
                                        </div>

                                        <div class="input-wrapper">
                                            <div class="input-cont skew-left">
                                                <input type="email" name="email" required="required"
                                                       class="user-email skew-right"
                                                       placeholder="Ваш email" tabindex="2">
                                            </div>
                                        </div>

                                        <button type="submit" class="skew-right gl-yellow-btn submit-btn" tabindex="3">
                                            <span class="skew-left">подписаться</span>
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
            @include('client.template.our-materials')
        </section>
        <!-- end of blog-material -->




        <!-- start of blog-material №2; TO DO: load blog-articles from data base in infinite cycle, in real-time-mode, via AJAX -->
        {{--<section class="blog-material">--}}
            {{--<div class="main-top-container bg-cont"--}}
                 {{--style="background-image: url('/images/blog-material/blog-material-image-2.jpg')">--}}
                {{--<div class="dark-mask"></div>--}}
                {{--<div class="container">--}}
                    {{--<div class="page-head">--}}
                        {{--<div class="bread-crumbs">--}}
                            {{--<a href="index.html">главная</a>--}}
                            {{--<a href="portfolio.html">блог</a>--}}
                            {{--<span class="active">Разработка рекламной стратегии и стратегии продвижения</span>--}}
                        {{--</div>--}}
                        {{--<h1 class="page-title">--}}
                            {{--РЕАКЦИЯ НА КРИЗИС: 6 ТЕНДЕНЦИЙ В ПОТРЕБЛЕНИИ ПРОДУКТОВ ПИТАНИЯ В УКРАИНЕ ч.2--}}
                        {{--</h1>--}}
                    {{--</div>--}}

                    {{--<div class="material-general-info">--}}
                        {{--<p class="material-date">01 Сентября 2017</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="blog-container triangle-left">--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-8">--}}
                            {{--<div class="blog-material-cont">--}}
                                {{--<!-- start of author-block -->--}}
                                {{--<div class="author-block">--}}
                                    {{--<div class="author-img">--}}
                                        {{--<img src="/images/blog-material/blog-author.jpg" alt="author-img">--}}
                                    {{--</div>--}}
                                    {{--<div class="author-info">--}}
                                        {{--<p class="name">Автор :--}}
                                            {{--<a class="link-to-author" href="blog-author.html" title="страница автора">--}}
                                                {{--Алексей Глаголев--}}
                                            {{--</a>--}}
                                        {{--</p>--}}
                                        {{--<p class="specialty">Специальность :--}}
                                            {{--<span>--}}
                                            {{--Front-End Developer--}}
                                        {{--</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- end of author-block -->--}}
                                {{--<p>--}}
                                    {{--Девальвация гривны, политическая ситуация и рост цен – основные--}}
                                    {{--факторы изменения спроса на товары общего употребления, в первую--}}
                                    {{--очередь – продукты питания. Маркетинговые исследования спроса показывают--}}
                                    {{--общее благосостояние нации и вектор развития страны.--}}
                                {{--</p>--}}
                                {{--<ul class="content-list">--}}
                                    {{--<li>--}}
                                        {{--<a href="#content-11">Тенденция №1: падение спроса на продукты питания первой--}}
                                            {{--необходимости</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#content-21">Тенденция №2: «заедание» проблем - увеличении спроса на--}}
                                            {{--товары с высокой калорийность</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#content-31">Тенденция №3: «наедание» болезней - вредная тенденция--}}
                                            {{--среди потребителей Украины</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#content-41">Резюме</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<p>--}}
                                    {{--<span>Девальвация гривны, политическая ситуация и рост цен </span>– основные--}}
                                    {{--факторы изменения спроса на товары общего употребления, в первую--}}
                                    {{--очередь – продукты питания. Маркетинговые исследования спроса показывают--}}
                                    {{--общее благосостояние нации и вектор развития страны. Кроме того,--}}
                                    {{--<span>исследование отношения потребителей к разным товарным группам –--}}
                                {{--важный инструмент построения ритейл-брендинга компании в сфере--}}
                                {{--АПК и продуктового хозяйства. Своевременное выявления падение--}}
                                {{--спроса на продукты питания позволяет скорректировать маркетинговую--}}
                                    {{--стратегию и позиционирование бренда.</span>--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--Мы провели исследование предпочтений потребителей рынка продуктовых--}}
                                    {{--товаров и выделили 6 тенденций потребителей Украины.--}}
                                {{--</p>--}}
                                {{--<div class="special-text question-text">--}}
                                    {{--<div class="special-text-inner">--}}
                                        {{--<p>--}}
                                            {{--Для того чтобы заказать анализ потребителей продуктов питания--}}
                                            {{--Украины обратитесь в компанию KOLORO. Наш менеджер проведет--}}
                                            {{--бесплатную консультацию. Контактная информация: +38 044 223 51 20.--}}
                                            {{--Для того чтобы заказать анализ потребителей продуктов питания--}}
                                            {{--Украины обратитесь в компанию KOLORO. Наш менеджер проведет--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<h2 id="content-11">Тенденция №1: падение спроса на продукты питания первой--}}
                                    {{--необходимости</h2>--}}
                                {{--<ol>--}}
                                    {{--<li>В 2015 году среди украинских потребителей зафиксировано падения покупательной.--}}
                                    {{--</li>--}}
                                    {{--<li>Причиной этому послужил рост потребительских цен на 43,3% за 2015 год.</li>--}}
                                    {{--<li>Рекордно поднялась стоимость на необходимые и полезные продукты – овощи (на--}}
                                        {{--67,7%).--}}
                                    {{--</li>--}}
                                {{--</ol>--}}
                                {{--<p>--}}
                                    {{--Мы провели исследование предпочтений потребителей рынка продуктовых--}}
                                    {{--товаров и выделили 6 тенденций потребителей Украины.--}}
                                {{--</p>--}}
                                {{--<div class="special-text attention-text">--}}
                                    {{--<div class="special-text-inner">--}}
                                        {{--<p>--}}
                                            {{--Для того чтобы заказать анализ потребителей продуктов питания--}}
                                            {{--Украины обратитесь в компанию KOLORO. Наш менеджер проведет--}}
                                            {{--бесплатную консультацию. Контактная информация: +38 044 223 51 20.--}}
                                            {{--Для того чтобы заказать анализ потребителей продуктов питания--}}
                                            {{--Украины обратитесь в компанию KOLORO. Наш менеджер проведет--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<p>--}}
                                    {{--Согласно последним прогнозам, цены на продукты питания могут подняться--}}
                                    {{--еще на 40% до конца 2016 года. Пока что основной сдерживающий фактор--}}
                                    {{--роста цен – низкая покупательная способность. На продукты, к которым--}}
                                    {{--украинцы уже потеряли интерес, производители не смогут повысить цены.--}}
                                    {{--Например, на свинину спрос упал, и цены практически не двигаются.--}}
                                    {{--Одновременно с этим вырос спрос на бюджетное мясо – курятину, что--}}
                                    {{--повлияло на рост цен в данном сегменте.--}}
                                {{--</p>--}}
                                {{--<!-- start of blog-items -->--}}
                                {{--<div class="blog-items clearfix">--}}
                                    {{--<div class="col-sm-6 blog-item-wrapper">--}}
                                        {{--<div class="blog-item">--}}
                                            {{--<div class="top-cont">--}}
                                                {{--<a class="link-to-material" href="blog-material.html">--}}
                                                    {{--<div class="bg-cont"></div>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="bottom-cont">--}}
                                                {{--<div class="material-info">--}}
                                                    {{--<span class="material-date">08:43, Июн 26, 2017</span>--}}
                                                    {{--<span class="material-author">--}}
                                        {{--<a class="link-to-author" href="blog-author.html" title="страница автора">--}}
                                            {{--Алексей Мельниченко--}}
                                        {{--</a>--}}
                                    {{--</span>--}}
                                                {{--</div>--}}
                                                {{--<h3 class="material-title">--}}
                                                    {{--<a class="link-to-material" href="blog-material.html">--}}
                                                        {{--Пятилетие в стиле 90х: в стиле 90х Пятилетие--}}
                                                    {{--</a>--}}
                                                {{--</h3>--}}
                                                {{--<p class="material-text">--}}
                                                    {{--Мы весьма радужно проводим наши корпоративы. Особенно, если это--}}
                                                    {{--годовщина--}}
                                                    {{--существования нашей любимой студии!--}}
                                                {{--</p>--}}
                                                {{--<a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ--}}
                                                    {{--СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-6 blog-item-wrapper">--}}
                                        {{--<div class="blog-item">--}}
                                            {{--<div class="top-cont">--}}
                                                {{--<a class="link-to-material" href="blog-material.html">--}}
                                                    {{--<div class="bg-cont"></div>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="bottom-cont">--}}
                                                {{--<div class="material-info">--}}
                                                    {{--<span class="material-date">08:43, Июн 26, 2017</span>--}}
                                                    {{--<span class="material-author">--}}
                                        {{--<a class="link-to-author" href="blog-author.html" title="страница автора">--}}
                                            {{--Алексей Мельниченко--}}
                                        {{--</a>--}}
                                    {{--</span>--}}
                                                {{--</div>--}}
                                                {{--<h3 class="material-title">--}}
                                                    {{--<a class="link-to-material" href="blog-material.html">--}}
                                                        {{--Пятилетие в стиле 90х: в стиле 90х Пятилетие--}}
                                                    {{--</a>--}}
                                                {{--</h3>--}}
                                                {{--<p class="material-text">--}}
                                                    {{--Мы весьма радужно проводим наши корпоративы. Особенно, если это--}}
                                                    {{--годовщина--}}
                                                    {{--существования нашей любимой студии!--}}
                                                {{--</p>--}}
                                                {{--<a class="material-category-link" href="blog.html">РАЗРАБОТКА РЕКЛАМНОЙ--}}
                                                    {{--СТРАТЕГИИ ПРОДВИЖЕНИЯ</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- end of blog-items -->--}}
                                {{--<h2 id="content-21">Тенденция №2: «заедание» проблем - увеличении спроса на товары с--}}
                                    {{--высокой калорийность</h2>--}}
                                {{--<ul>--}}
                                    {{--<li>В 2015 году среди украинских потребителей зафиксировано падения покупательной.--}}
                                    {{--</li>--}}
                                    {{--<li>Причиной этому послужил рост потребительских цен на 43,3% за 2015 год.</li>--}}
                                    {{--<li>Рекордно поднялась стоимость на необходимые и полезные продукты – овощи (на--}}
                                        {{--67,7%).--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<h2 id="content-31">Тенденция №3: «наедание» болезней - вредная тенденция среди--}}
                                    {{--потребителей Украины</h2>--}}
                                {{--<p>--}}
                                    {{--Питание – это фактор, который на 50% определяет состояние здоровья.--}}
                                    {{--А здоровье украинцев тает на глазах – потребление необходимых и--}}
                                    {{--полезных продуктов питания отстает от медицинских рекомендованных--}}
                                    {{--норм на 40-60%. Только за 2015 год уровень потребления мяса упал--}}
                                    {{--до 56 кг/год при норме в 80 кг. Молочных продуктов стали есть--}}
                                    {{--на 41% ниже нормы, фруктов и ягод – на 42%, рыбы – на 45%. А того--}}
                                    {{--же хлеба – на 7% больше, картофеля – на 14%.--}}
                                {{--</p>--}}

                                {{--<!-- start of blog-slider -->--}}
                                {{--<div class="flexslider">--}}
                                    {{--<ul class="slides">--}}
                                        {{--<div class="share-btn">--}}
                                            {{--<a href="#" class="gl-yellow-btn skew-right">--}}
                                                {{--<span class="skew-left">+ поделиться</span>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        {{--<li data-thumb="/images/blog-material/blog-image-slide-1.jpg">--}}
                                            {{--<img src="/images/blog-material/blog-image-slide-1.jpg"--}}
                                                 {{--alt="blog-slider-img">--}}
                                        {{--</li>--}}
                                        {{--<li data-thumb="/images/blog-material/blog-image-slide-2.jpg">--}}
                                            {{--<img src="/images/blog-material/blog-image-slide-2.jpg"--}}
                                                 {{--alt="blog-slider-img">--}}
                                        {{--</li>--}}
                                        {{--<li data-thumb="/images/blog-material/blog-image-slide-3.jpg">--}}
                                            {{--<img src="/images/blog-material/blog-image-slide-3.jpg"--}}
                                                 {{--alt="blog-slider-img">--}}
                                        {{--</li>--}}
                                        {{--<li data-thumb="/images/blog-material/blog-image-slide-4.jpg">--}}
                                            {{--<img src="/images/blog-material/blog-image-slide-4.jpg"--}}
                                                 {{--alt="blog-slider-img">--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<!-- end of blog-slider -->--}}

                                {{--<h2 id="content-41">Резюме</h2>--}}
                                {{--<p>--}}
                                {{--<span>Рост цен и девальвация гривны привели к падению покупательной способности--}}
                                    {{--украинцев. В первую очередь они стали приобретать меньше необходимых и--}}
                                {{--полезных продуктов в эконом-сегменте.</span> В это же время увеличился разрыв--}}
                                    {{--между средним ценовым сегментом и премиум-классом. Состоятельные украинцы--}}
                                    {{--покупают больше и лучше, когда малообеспеченные слои населения едва--}}
                                    {{--выдерживают строгую диету. Осознанность украинцев и желание поддерживать--}}
                                    {{--устойчивое развитие привели к росту спроса на органические продукты и local food.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--Обратитесь в компанию KOLORO и закажите исследование потребителей--}}
                                    {{--продуктов питания интересующей вас категории. Срок проведения маркетингового--}}
                                    {{--исследования составляет 14 дней и обеспечит вас наиболее полной--}}
                                    {{--информацией о состоянии рынка.--}}
                                {{--</p>--}}

                                {{--<!-- start of contact-info, will be SIMILAR on ALL blog-material-pages!!!  -->--}}
                                {{--<div class="contact-info">--}}
                                    {{--<p><span>Контактная информация:</span></p>--}}
                                    {{--<p class="tel">+38 044 223 51 20</p>--}}
                                    {{--<p class="email">--}}
                                        {{--<a href="mailto:info@kinesko.ua">info@kinesko.ua</a>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                                {{--<!-- end of contact-info -->--}}

                                {{--<!-- !!! TO DO: turn on star-rating module !!! -->--}}
                                {{--<!-- start of star-rating-cont -->--}}
                                {{--<div class="star-rating-cont">--}}
                                    {{--<div class="star-rating">--}}
                                        {{--<input class="rating" value="3" type="number">--}}
                                    {{--</div>--}}
                                    {{--<p class="voices-count"><span>99999</span> голосов </p>--}}
                                {{--</div>--}}
                                {{--<!-- end of star-rating-cont -->--}}

                                {{--<!-- start of author-block -->--}}
                                {{--<div class="author-block">--}}
                                    {{--<div class="author-img">--}}
                                        {{--<img src="/images/blog-material/blog-author.jpg" alt="author-img">--}}
                                    {{--</div>--}}
                                    {{--<div class="author-info">--}}
                                        {{--<p class="name">Автор :--}}
                                            {{--<a class="link-to-author" href="blog-author.html" title="страница автора">--}}
                                                {{--Алексей Глаголев--}}
                                            {{--</a>--}}
                                        {{--</p>--}}
                                        {{--<p class="specialty">Специальность :--}}
                                            {{--<span>--}}
                                            {{--Front-End Developer--}}
                                        {{--</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- end of author-block -->--}}

                                {{--<!-- start of comments-block -->--}}
                                {{--<div class="comments-block">--}}
                                    {{--<!-- add HyperComments widget with the same ID as on KLONA -->--}}
                                    {{--<div class="hypercomments">--}}
                                        {{--<div id="hypercomments_widget"></div>--}}
                                        {{--<script type="text/javascript">--}}
                                            {{--_hcwp = window._hcwp || [];--}}
                                            {{--_hcwp.push({widget: "Stream", widget_id: 73852, hc_disable: 1});--}}
                                            {{--(function () {--}}
                                                {{--if ("HC_LOAD_INIT" in window) return;--}}
                                                {{--HC_LOAD_INIT = true;--}}
                                                {{--var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();--}}
                                                {{--var hcc = document.createElement("script");--}}
                                                {{--hcc.type = "text/javascript";--}}
                                                {{--hcc.async = true;--}}
                                                {{--hcc.src = ("https:" == document.location.protocol ? "https" : "http") + "://w.hypercomments.com/widget/hc/73852/" + lang + "/widget.js";--}}
                                                {{--var s = document.getElementsByTagName("script")[0];--}}
                                                {{--s.parentNode.insertBefore(hcc, s.nextSibling);--}}
                                            {{--})();--}}
                                        {{--</script>--}}
                                        {{--<a href="http://hypercomments.com" class="hc-link" title="comments widget">--}}
                                            {{--comments powered by HyperComments--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<!-- end of  HyperComments widget -->--}}
                                {{--</div>--}}
                                {{--<!-- end of comments-block -->--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-lg-4">--}}
                            {{--<div class="blog-sidebar-wrapper">--}}
                                {{--//= template/blog-sidebar.html--}}
                                    {{--@include('client.template.blog-sidebar')--}}
                                {{--<!-- start of blog-subscribe-form -->--}}
                                {{--<form class="blog-subscribe-form">--}}
                                    {{--<div class="gl-container">--}}
                                        {{--<h2 class="form-header">Понравилась статья?</h2>--}}
                                        {{--<h3 class="form-header-small">Подписывайтесь на наши обновления</h3>--}}

                                        {{--<div class="input-wrapper">--}}
                                            {{--<div class="input-cont skew-right">--}}
                                                {{--<input type="text" name="user-name" required="required"--}}
                                                       {{--class="user-name skew-left"--}}
                                                       {{--placeholder="Ваше имя" tabindex="1">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="input-wrapper">--}}
                                            {{--<div class="input-cont skew-left">--}}
                                                {{--<input type="email" name="user-email skew-left" required="required"--}}
                                                       {{--class="user-email skew-right"--}}
                                                       {{--placeholder="Ваш email" tabindex="2">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<button type="submit" class="skew-right gl-yellow-btn submit-btn" tabindex="3">--}}
                                            {{--<span class="skew-left">подписаться</span>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                                {{--<!-- end of blog-subscribe-form -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--//= template/our-materials.html--}}
            {{--@include('client.template.our-materials')--}}
        {{--</section>--}}
        {{--<!-- end of blog-material -->--}}

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

            $('.flexslider').flexslider({
                animation: "fade",
                controlNav: "thumbnails",
                easing: "swing"
            });
        });

        // start of star-rating initialization
        $(".rating").rating({min: 1, max: 5, step: 0.5, size: 'sm'});
        $('.clear-rating').hide();
        $('.caption').hide();
        // end of of star-rating initialization

    </script>
@stop