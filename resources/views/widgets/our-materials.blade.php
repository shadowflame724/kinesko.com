<!-- start of  our-materials-->
<section class="our-materials triangle-left">
    <div class="container">
        <p class="our-materials-header black-color">@lang('client.our-materials.header')</p>

        <div class="our-materials-cont clearfix">
            <div class="row">
                @foreach($posts as $post)

                    <div class="col-md-4 blog-item-wrapper">
                        <div class="blog-item">
                            <div class="top-cont">
                                <a class="link-to-material" href="{{ route('client.blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
                                    <div class="bg-cont" style="background-image: url('/storage/{{ $post->image_thumb }}')"></div>
                                </a>
                            </div>
                            <div class="bottom-cont">
                                <div class="material-info">
                                    <span class="material-date">{{ $post->created_at }}</span>
                                    <span class="material-author">
                                    <a class="link-to-author" href="{{ route('client.blog.author', ['author' => $post->author->slug]) }}" title="@lang('client.blog.author_page')">
                                        {{ $post->author->{'name' . $langSuf} }}
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
    </div>
</section>
<!-- end of our-materials -->