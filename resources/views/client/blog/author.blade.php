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
                                        <p class="cont-title">@lang('client.blog.author_common_rating')</p>
                                        <div class="star-rating">
                                            <input class="rating" value="{{ $commonRating / $commonVotes }}"
                                                   type="number">
                                        </div>
                                        <p class="voices-count">@lang('client.general.votes') <span>{{ $commonVotes }}</span></p>
                                    </div>

                                    <div class="views-cont">
                                        <p class="cont-title">@lang('client.blog.author_common_views') {{ $commonViews }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of author-block -->

                        <h3 class="section-header black-color">@lang('client.blog.all_articles')</h3>

                        <div class="blog-items">
                            @foreach($posts as $post)

                                <div class="blog-item-wrapper">
                                    <div class="blog-item">
                                        <div class="top-cont">
                                            <a class="link-to-material" href="{{ route('client.blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
                                                <div class="bg-cont" style="background-image: url('/storage/{{ $post->image_thumb }}')"></div>
                                            </a>
                                        </div>
                                        <div class="bottom-cont">
                                            <div class="material-info">
                                                <span class="material-date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
                                                <span class="material-author">
                                        <a class="link-to-author"
                                           href="{{ route('client.blog.author', ['user' => $user->slug]) }}"
                                           title="@lang('client.blog.author_page')">
                                            {{ $user->{'name' . $langSuf} }}
                                        </a>
                                    </span>
                                            </div>
                                            <h3 class="material-title">
                                                <a class="link-to-material" href="{{ route('client.blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
                                                    {{ $post->{'title' . $langSuf} }}
                                                </a>
                                            </h3>
                                            <p class="material-text">
                                                {{ $post->{'description' . $langSuf} }}
                                            </p>
                                            <a class="material-category-link" href="{{ route('client.blog.category', ['category' => $post->category->slug]) }}">{{ $post->category->{'title' . $langSuf} }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="blog-sidebar-wrapper">
                            {{--//= template/blog-sidebar.html--}}
                            {{--@include('client.template.blog-sidebar')--}}
                            @widget('BlogSideBar')
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{ $posts->links('vendor.pagination.blog-pagination') }}

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