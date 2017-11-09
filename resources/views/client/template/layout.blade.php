<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.template.head')

    <title>
    @yield('page-title')
    </title>
    <meta name="description" content="@yield('page-description')">
    <meta name="keywords" content="@yield('page-keywords')">

    @yield('page-style')
@php($langSuf =  \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() )
</head>
<body>
{{--//= template/header.html--}}
@include('client.template.header')

@yield('content')

{{--//= template/footer.html--}}
@include('client.template.footer')
{{--//= template/kinesko-forms.html--}}
@include('client.template.kinesko-forms')
{{--//= template/script.html--}}
@include('client.template.script')

@yield('page-scripts')

<!-- start scripts from admin panel (Jivasite etc.) -->
{!! setting('site.scripts') !!}
<!-- end scripts from admin panel -->

</body>
</html>