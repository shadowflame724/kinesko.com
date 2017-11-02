<!DOCTYPE html>
<html lang="en">
<head>
    {{--//= template/head.html--}}
    @include('client.template.head')

    <title>Страница не найдена</title>
</head>
<body>
{{--//= template/header.html--}}
@include('client.template.header')

<section id="page-404">
    <div class="main-top-container bg-cont">
        <div class="dark-mask"></div>
        <div class="container">
            <h1 class="main-header">
                Ошибка <span>404</span>
            </h1>
            <p class="absent-text">такой страницы не существует</p>
            <p class="not-found-text">не нашли что искали?</p>
        </div>
    </div>

    <!-- start of our-works -->
    <div class="our-works triangle-right">
        <div class="container">
            <h3 class="section-header">Расслабьтесь и посмотрите наше портфолио</h3>
        </div>

        {{--//= template/portfolio-block-big.html--}}
        @include('client.template.portfolio-block-big')

    </div>
    <!-- end of our-works -->

</section>

{{--//= template/our-materials.html--}}
@include('client.template.our-materials')

{{--//= template/footer.html--}}
@include('client.template.footer')

{{--//= template/kinesko-forms.html--}}
@include('client.template.kinesko-forms')

{{--//= template/script.html--}}
@include('client.template.script')


<!-- scripts only this on page -->

<!-- only this page -->

</body>
</html>