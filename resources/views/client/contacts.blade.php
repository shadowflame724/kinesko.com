@extends('client.template.layout')

@section('page-title', $page->{'title' . $langSuf})

@section('page-style')
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="/css/libs/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/libs/owl.theme.default.min.css">
@stop

@section('content')
<!-- start of contacts page -->
<section id="contacts-page">
    <div class="plashka"></div>

    <!-- start of fly-block -->
    <div class="fly-block">
        <ul class="contacts-menu">
            <li class="kiev active">Киев</li>
            <li class="moscow">Москва</li>
        </ul>

        <span class="close-contacts-btn">
            <i class="icon icon-cross-yellow"></i>
        </span>

        <div class="tab-panel">
            <!-- start of kiev tab-pane -->
            <div class="tab-pane animated kiev active clearfix">
                <div class="city-cont">
                    <i class="icon kiev-icon"></i>
                    <p class="city-name">Киев</p>
                </div>
                <div class="contacts-info">
                    <p class="tel">
                        <a href="tel:+38(044)2235120">+38 (044) 223 51 20</a>
                    </p>
                    <p class="tel">
                        <a href="tel:+38(093)73434312">+38 (093) 73 43 4312</a>
                    </p>
                    <p class="email">
                        <a href="mailto:info@kinesko.ua">
                            info@kinesko.ua
                        </a>
                    </p>
                    <p class="address">ул. Трехсвятительская 5/1-А, офис 1, 2-й этаж</p>

                    <a href="/" class="skew-right gl-transparent-btn route-btn">
                        <span class="skew-left">проложить маршрут</span>
                    </a>
                </div>
            </div>
            <!-- end of kiev tab-pane -->

            <!-- start of moscow tab-pane -->
            <div class="tab-pane animated moscow clearfix">
                <div class="city-cont">
                    <i class="icon kiev-icon"></i>
                    <p class="city-name">Москва</p>
                </div>
                <div class="contacts-info">
                    <p class="tel">
                        <a href="tel:+38(050)73434312">+38 (050) 73 43 4312</a>
                    </p>
                    <p class="tel">
                        <a href="tel:+38(050)73434312">+38 (050) 73 43 4312</a>
                    </p>
                    <p class="email">
                        <a href="mailto:info@kinesko.ru">
                            info@kinesko.ru
                        </a>
                    </p>
                    <p class="address">ул. Новый Арбат 5/1-А, офис 1, 2-й этаж</p>

                    <a href="/" class="skew-right gl-transparent-btn route-btn">
                        <span class="skew-left">проложить маршрут</span>
                    </a>
                </div>
            </div>
            <!-- end of moscow tab-pane -->
        </div>
    </div>
    <!-- end of fly-block -->

    <div class="maps-container">
        <p class="maska"></p>

        <div id="kiev-map" class="kinesko-map animated kiev active"></div>
        <div id="moscow-map" class="kinesko-map animated moscow"></div>

        <div class="main-top-container">
            <div class="page-head">
                <div class="bread-crumbs">
                    <a href="{{ route('client.index') }}">главная</a>
                    <span class="active">контакты</span>
                </div>
                <h1 class="page-title">контакты</h1>
            </div>
            <div class="city-name">
                <p class="active">Киев</p>
                <p>Москва</p>
            </div>
        </div>

        <div class="slider-btn-cont">
            <span class="icon-cont arrow-left-btn">
                <i class="icon icon-arrow-left"></i>
                <i class="icon icon-hover icon-arrow-left-hover"></i>
            </span>
            <span class="icon-cont arrow-right-btn">
                <i class="icon icon-arrow-right"></i>
                <i class="icon icon-hover icon-arrow-right-hover"></i>
            </span>
        </div>

        <!-- photo slider starts -->
        <div class="contacts-slider-cont map-skew-right">
            <!--<div class="dark-mask"></div>-->
            <div id="kiev-slider" class="contacts-slider owl-carousel owl-theme map-skew-left active">
                <div class="item slider-item">
                    <div class="bg-cont" style="background-image: url('/images//contacts/kiev-photo-office.jpg')"></div>
                    <!--<img src="/images//contacts/photo-office.jpg" alt="photo-image">-->
                </div>
                <div class="item slider-item">
                    <div class="bg-cont" style="background-image: url('/images//contacts/kiev-photo-office.jpg')"></div>
                    <!--<img src="/images//contacts/photo-office.jpg" alt="photo-image">-->
                </div>
                <div class="item slider-item">
                    <div class="bg-cont" style="background-image: url('/images//contacts/kiev-photo-office.jpg')"></div>
                    <!--<img src="/images//contacts/photo-office.jpg" alt="photo-image">-->
                </div>
            </div>

            <div id="moscow-slider" class="contacts-slider owl-carousel owl-theme map-skew-left">
                <div class="item slider-item">
                    <div class="bg-cont" style="background-image: url('/images//contacts/moscow-photo-office.jpg')"></div>
                </div>
                <div class="item slider-item">
                    <div class="bg-cont" style="background-image: url('/images//contacts/moscow-photo-office.jpg')"></div>
                </div>
                <div class="item slider-item">
                    <div class="bg-cont" style="background-image: url('/images//contacts/moscow-photo-office.jpg')"></div>
                </div>
            </div>
        </div>
        <!-- photo slider ends -->
    </div>

    <!-- start of write-us-letter -->
    <div class="write-us-letter triangle-left">
        <div class="container">
            <div class="write-btn-cont">
                <div class="write-btn-inner animated">
                    <a href="/" class="skew-right gl-transparent-btn write-btn">
                        <span class="skew-left">написать нам письмо</span>
                    </a>
                </div>
            </div>

            <!-- start of write-us-form (part of order-form) -->
            <form class="write-us-form animated">
                <div class="form-wrapper">

                    <div class="close-btn">
                        <i class="icon icon-cross-yellow"></i>
                    </div>

                    <p class="form-header">Расскажите нам о своем проекте</p>
                    <p class="form-header-small">Получите консультацию уже сейчас!</p>

                    <input type="text" name="user-name" required="required" class="user-name"
                           placeholder="Имя *" tabindex="1">

                    <div class="full-container clearfix">
                        <div class="left-cont">
                            <input type="tel" name="user-tel" required="required" class="user-tel"
                                   placeholder="Телефон *" tabindex="3">
                        </div>
                        <div class="right-cont">
                            <input type="email" name="user-email" required="required" class="user-email"
                                   placeholder="email *" tabindex="2">
                        </div>
                    </div>

                    <input type="text" name="user-text" required="required" class="user-text"
                           placeholder="Сопроводительный текст *" tabindex="3">

                    <div class="add-file-cont">
                        <input type="file" name="user-file" id="write-us-file-2" multiple data-multiple-caption="{count} files selected"
                               class="inputfile inputfile-2">
                        <label for="write-us-file-2"><span>+ Добавить файл</span></label>
                    </div>

                    <button type="submit" class="skew-right gl-transparent-btn submit-btn">
                        <span class="skew-left">Отправить</span>
                    </button>

                </div>
            </form>
            <!-- end of write-us-form (part of order-form) -->

        </div>
    </div>
    <!-- end of write-us-letter -->

</section>
<!-- end of contacts page -->

@stop


@section('page-scripts')
<!-- black Google maps, via API, starts -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxp0_tlV4Dc7H80AVmFWO4yEVoeQckEpI"></script>
<!-- black Google maps, via API, ends-->

<!-- OwlCarousel -->
<script src="/js/libs/owl.carousel.min.js"></script>

<script src="/js/contacts.js"></script>
@stop
