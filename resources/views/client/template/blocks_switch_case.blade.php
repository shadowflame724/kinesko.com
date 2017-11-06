@php($type = $block->type)
@switch($type)
    @case('list')
    <h3 class="section-header white-color">{{ $block->{'title' . $langSuf} }}</h3>

    {!! $block->{'body' . $langSuf} !!}
    @break

    @case('text')
    <div class="text-block-cont">
        <div class="info-left col-md-5">
            <h2 class="block-title">{{ $block->{'title' . $langSuf} }}</h2>
        </div>
        <div class="info-right col-md-7">
            {!! $block->{'body' . $langSuf} !!}
        </div>
    </div>
    @break

    @case('image')
    <div class="img-cont">
        {!! $block->body_ru !!}
    </div>
    @break

    @case('two_image')
    <div class="two-img-cont clearfix">
        <div class="img-cont">
            {!! $block->body_ru !!}
        </div>
        <div class="img-cont">
            {!! $block->body_en !!}
        </div>
    </div>
    @break

    @case('video')
    <div class="video-cont ratio-16-to-9">
        <iframe src="{!! $block->title_ru !!}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
    @break

    @case('textFullScreen')

    <div class="text-block-cont">
        <div class="info-center">
            <p>
                {!! $block->{'body' . $langSuf} !!}
            </p>

        </div>
    </div>
    @break

@endswitch