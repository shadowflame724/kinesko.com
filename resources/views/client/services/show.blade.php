@extends('client.template.layout')

@section('page-title', $service->{'title' . $langSuf})

@section('content')

    <!-- start of service-material -->
    <section id="service-material">
        <div class="main-top-container bg-cont" style="background-image: url(/storage/{{ $service->image }});">
            <div class="dark-mask"></div>
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
                            <span class="skew-left">@lang('client.services.show_order_service')</span>
                        </a>
                    </div>
                    <div class="price-block">
                        <p class="price-title">@lang('client.services.show_price')</p>
                        <p class="price">{{ $service->price }} @lang('client.services.currency')</p>
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
