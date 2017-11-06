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
                    <h1 class="page-title">"{{ $query }}"</h1>
                </div>

            </div>
        </div>

        <div class="blog-container triangle-left">
            <div class="container">
                <div class="row">

                    <!-- start of search-result-form -->
                    <form class="search-result-form" action="{{ route('client.search') }}" id="search_form">

                        <div class="inputs-container">

                            <div class="left-cont">
                                <div class="input-box-wrapper text-box-wrapper">
                                    <div class="input-box">
                                        <input type="text" name="query" required="required" class="search-text"
                                               @if(isset($query)) value="{{$query}}" @else placeholder="Поиск"
                                               @endif tabindex="1">
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

                            @foreach($results as $result)
                                @php
                                    $type = strtolower(str_replace('App\\', '', get_class($result)));
                                @endphp

                            @switch($type)

                                    @case ('post')
                                    <div class="blog-item-wrapper">
                                        <div class="blog-item">
                                            <div class="top-cont">

                                                <a class="link-to-material"
                                                   href="{{ route('client.blog.show', ['category' => $result->category->slug, 'post' => $result->slug]) }}">
                                                    <div class="bg-cont" style="background-image: url('/storage/{{ $result->image }}');"></div>
                                                </a>

                                            </div>
                                            <div class="bottom-cont">
                                                <div class="material-info">
                                                    <span class="material-date">{{ $result->created_at->format('d-F-Y') }}</span>
                                                    <span class="material-author">
                                        <a class="link-to-author"
                                           href="{{ route('client.blog.author', ['user' => $result->author->slug]) }}"
                                           title="@lang('client.blog.author_page')">
                                            {{ $result->author->{'name' . $langSuf} }}
                                        </a>
                                    </span>
                                                </div>
                                                <h3 class="material-title">
                                                    <a class="link-to-material"
                                                       href="{{ route('client.blog.show', ['category' => $result->category->slug, 'post' => $result->slug]) }}">
                                                        {{ $result->{'title' . $langSuf} }}
                                                    </a>
                                                </h3>
                                                <p class="material-text">
                                                    {{ $result->{'description' . $langSuf} }}
                                                </p>
                                                <a class="material-category-link"
                                                   href="{{ route('client.blog.category', ['category' => $result->category->slug]) }}">{{ $result->category->{'title' . $langSuf} }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @break

                                    @case ('service')
                                    <div class="blog-item-wrapper">
                                        <div class="blog-item">
                                            <div class="top-cont">
                                                <a class="link-to-material" href="{{ route('client.services.show', ['service' => $result->slug]) }}">
                                                    <div class="bg-cont"
                                                         style="background-image: url('/storage/{{ $result->image }}');"></div>
                                                </a>
                                            </div>
                                            <div class="bottom-cont">
                                                <div class="material-info">
                            <span class="material-author">
                            <a class="link-to-author" href="{{ route('client.services.index') }}" title="страница услуг">
                            @lang('client.menu.services')
                            </a>
                            </span>
                                                </div>
                                                <h3 class="material-title">
                                                    <a class="link-to-material" href="{{ route('client.services.show', ['service' => $result->slug]) }}">
                                                        {{ $result->{'title' . $langSuf} }}
                                                    </a>
                                                </h3>
                                                <p class="material-text">
                                                    {{ $result->{'meta_description' . $langSuf} }}
                                                </p>
                                                <a class="material-category-link" href="{{ route('client.services.index') }}">{{ $result->category->{'title' . $langSuf} }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    @break

                                    @case ('portfolio')
                                    <div class="blog-item-wrapper">
                                        <div class="blog-item">
                                            <div class="top-cont">
                                                <a class="link-to-material" href="{{ route('client.portfolio.show', ['category' => $result->category->slug, 'post' => $result->slug]) }}">
                                                    <div class="bg-cont" style="background-image: url('/storage/{{ $result->image }}');"></div>
                                                </a>
                                            </div>
                                            <div class="bottom-cont">
                                                <div class="material-info">
                                                    <span class="material-date">{{ $result->created_at }}</span>
                                                    <span class="material-author">
                            <a class="link-to-author" href="{{ route('client.portfolio.index') }}" title="страница портфолио">
                            @lang('client.menu.portfolio')
                            </a>
                            </span>
                                                </div>
                                                <h3 class="material-title">
                                                    <a class="link-to-material" href="{{ route('client.portfolio.show', ['category' => $result->category->slug, 'post' => $result->slug]) }}">
                                                        {{ $result->{'title' . $langSuf} }}
                                                    </a>
                                                </h3>
                                                <p class="material-text">
                                                    {{ $result->{'meta_description' . $langSuf} }}
                                                </p>
                                                <a class="material-category-link" href="{{ route('client.portfolio.category', ['category' => $result->category->slug]) }}">{{ $result->category->{'title' . $langSuf} }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    @break
                                @endswitch
                            @endforeach
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
        {{ $results->links('vendor.pagination.blog-pagination') }}

    </section>
    <!-- end of search-result -->
@stop

@section('page-scripts')
    <!-- youtube widget script -->
    <script src="https://apis.google.com/js/platform.js"></script>
    <script>
        $('#search_form').on('submit', function () {
            var checkboxInHeader = $('#checkbox-in-header');
            var checkboxInText = $('#checkbox-in-text');
            if (checkboxInHeader.is(':checked') && checkboxInText.is(':checked')) {
                $("input[name='search-condition']").val("all");
            }
        })
    </script>
@stop