@extends('client.template.layout')

@section('page-title', $page->{'seo_title' . $langSuf})
@section('page-description', $page->{'meta_description' . $langSuf})
@section('page-keywords', $page->{'meta_keywords' . $langSuf})

@section('content')
    <!-- start of blog-page -->
    <section id="blog-page">
        <div class="main-top-container bg-cont">
            <div class="container">
                <div class="page-head">
                    <div class="bread-crumbs">
                        <a href="{{ route('client.index') }}">@lang('client.menu.index')</a>
                        <span class="active">@lang('client.menu.blog')</span>
                    </div>
                    <h1 class="page-title">@lang('client.menu.blog')</h1>
                </div>

                <nav class="blog-nav">
                    <ul>
                        <li @if($categoryId == null) class="active" @endif>
                            <a href="{{ route('client.blog.index') }}">
                                <span>@lang('client.general.all_categories')</span>
                            </a>
                        </li>
                        @foreach($categories as $postCategory)
                            <li @if($categoryId != null AND $categoryId == $postCategory->id) class="active" @endif>
                                <a href="{{ route('client.blog.category', ['category' => $postCategory->slug]) }}">
                                    <span>{{ $postCategory->{'title' . $langSuf} }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

            </div>
        </div>

        <div class="blog-container triangle-left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-items">
                            @foreach($posts as $post)
                                <div class="blog-item-wrapper">
                                    <div class="blog-item">
                                        <div class="top-cont">
                                            <a class="link-to-material"
                                               href="{{ route('client.blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
                                                <div class="bg-cont"
                                                     style="background-image: url('/storage/{{ $post->image_thumb }}');"></div>
                                            </a>
                                        </div>
                                        <div class="bottom-cont">
                                            <div class="material-info">
                                                <span class="material-date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
                                                <span class="material-author">
                                        <a class="link-to-author"
                                           href="{{ route('client.blog.author', ['user' => $post->author->slug ]) }}"
                                           title="страница автора">
                                            {{ $post->author->{'name' . $langSuf} }}
                                        </a>
                                    </span>
                                            </div>
                                            <h3 class="material-title">
                                                <a class="link-to-material"
                                                   href="{{ route('client.blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
                                                    {{ $post->{'title' . $langSuf} }}
                                                </a>
                                            </h3>
                                            <p class="material-text">
                                                {{ $post->{'description' . $langSuf} }}
                                            </p>
                                            <a class="material-category-link"
                                               href="{{ route('client.blog.category', ['category' => $post->category->slug]) }}">{{ $post->category->{'title' . $langSuf} }}</a>
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
    <!-- end of blog-page -->
@stop

@section('page-scripts')

    <!-- youtube widget script -->
    <script src="https://apis.google.com/js/platform.js"></script>
@stop