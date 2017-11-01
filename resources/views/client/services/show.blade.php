@extends('client.template.layout')

@section('page-title', $service->{'title' . $langSuf})

@section('content')

    <!-- start of service-material -->
    <section id="service-material">
        <div class="main-top-container bg-cont">
            <div class="container">
                <div class="page-head">
                    <div class="bread-crumbs">
                        <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                        <a href="{{ route('client.services.index') }}">@lang('client.menu.services')</a>
                        <span class="active">{{ $service->category->{'title' . $langSuf} }}</span>
                    </div>
                    <h1 class="page-title">{{ $service->{'title' . $langSuf} }}</h1>
                </div>

                <div class="service-price-container">
                    <div class="order-btn">
                        <a href="/" class="skew-right gl-transparent-btn order-form-btn">
                            <span class="skew-left">заказать услугу</span>
                        </a>
                    </div>
                    <div class="price-block">
                        <p class="price-title">стоимость от</p>
                        <p class="price">{{ $service->price }} грн</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- start of white wrapper -->
        <div class="material-wrapper white-wrapper triangle-left">
            <div class="container">
                <div class="row">
                    @foreach($whiteBlocks as $block)
                        @include('client.template.blocks_switch_case')

                        {{--@php($type = $block->type)--}}
                        {{--@switch($type)--}}
                            {{--@case('text')--}}
                            {{--<div class="text-block-cont">--}}
                                {{--<div class="info-left col-md-5">--}}
                                    {{--<h2 class="block-title">{{ $block->{'title' . $langSuf} }}</h2>--}}
                                {{--</div>--}}
                                {{--<div class="info-right col-md-7">--}}
                                    {{--{!! $block->{'body' . $langSuf} !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@break--}}

                            {{--@case('image')--}}
                            {{--<div class="img-cont">--}}
                                {{--{!! $block->body_ru !!}--}}
                                {{--<img src="/images/service-material/service-material-image.jpg" alt="service-picture">--}}
                            {{--</div>--}}
                            {{--@break--}}

                            {{--@case('two_image')--}}
                            {{--<div class="two-img-cont clearfix">--}}
                                {{--<div class="img-cont">--}}
                                    {{--{!! $block->body_ru !!}--}}
                                    {{--<img src="/images/service-material/picture-2.jpg" alt="service-picture">--}}
                                {{--</div>--}}
                                {{--<div class="img-cont">--}}
                                    {{--{!! $block->body_en !!}--}}

                                    {{--<img src="/images/service-material/picture-2.jpg" alt="service-picture">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@break--}}

                            {{--@case('video')--}}
                            {{--<div class="video-cont ratio-16-to-9">--}}
                                {{--<iframe src="{!! $block->title_ru !!}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            {{--@break--}}

                        {{--@endswitch--}}

                    @endforeach
                </div>
            </div>
        </div>
        <!-- end of white wrapper -->

        <!-- start of black wrapper -->
        <div class="material-wrapper black-wrapper triangle-right">
            <div class="container">
                <div class="row">

                    @foreach($blackBlocks as $block)
                        @include('client.template.blocks_switch_case')
                        {{--@php($type = $block->type)--}}
                        {{--@switch($type)--}}
                            {{--@case('list')--}}
                            {{--<h3 class="section-header white-color">{{ $block->{'title' . $langSuf} }}</h3>--}}

                            {{--{!! $block->{'body' . $langSuf} !!}--}}
                            {{--@break--}}

                            {{--@case('text')--}}
                            {{--<div class="text-block-cont">--}}
                                {{--<div class="info-left col-md-5">--}}
                                    {{--<h2 class="block-title">{{ $block->{'title' . $langSuf} }}</h2>--}}
                                {{--</div>--}}
                                {{--<div class="info-right col-md-7">--}}
                                    {{--{!! $block->{'body' . $langSuf} !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@break--}}

                            {{--@case('image')--}}
                            {{--<div class="img-cont">--}}
                                {{--{!! $block->body_ru !!}--}}
                            {{--</div>--}}
                            {{--@break--}}

                            {{--@case('two_image')--}}
                            {{--<div class="two-img-cont clearfix">--}}
                                {{--<div class="img-cont">--}}
                                    {{--{!! $block->body_ru !!}--}}
                                {{--</div>--}}
                                {{--<div class="img-cont">--}}
                                    {{--{!! $block->body_en !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@break--}}

                            {{--@case('video')--}}
                            {{--<div class="video-cont ratio-16-to-9">--}}
                                {{--<iframe src="{!! $block->title_ru !!}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            {{--@break--}}

                        {{--@endswitch--}}
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end of black wrapper -->

    </section>
    <!-- end of service-material -->
    {{--//= template/portfolio-block-small.html--}}
    @include('client.template.portfolio-block-small')
@stop
