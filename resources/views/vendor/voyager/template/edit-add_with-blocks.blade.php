@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <style>
        .voyager-trash {
            color: red;
            font-size: 2em;
        }
    </style>

@stop

@section('page_title', __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form" id="main-form"
                          class="form-edit-add"
                          action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                          method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    @if(isset($dataTypeContent->id))
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                            <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp
                                @if ($options && isset($options->formfields_custom))
                                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                                @else
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@else{{ '' }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if($row->type == 'relationship')
                                            @include('voyager::formfields.relationship')
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach


                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button id="service-safe" type="submit"
                                    class="btn btn-primary save">{{ __('voyager.generic.save') }}</button>
                        </div>
                    </form>

                    @php($globalCount = 0)

                    <div class="panel-body">
                        <div class="alert alert-primary" role="alert">
                            <div class="form-group">
                                <label for="selectBlockType"><strong style="color: #0c0c0c">Select Block
                                        Type</strong></label>
                                <select class="form-control" id="selectBlockType">
                                    <optgroup label="white wrapper">
                                        <option value="w_text">Text Block</option>
                                        <option value="w_image">Single Image Block</option>
                                        <option value="w_two_image">Two Images Block</option>
                                        <option value="w_video">Video Block</option>
                                    </optgroup>
                                    <optgroup label="black wrapper">
                                        <option value="b_list">List Block</option>
                                        <option value="b_text">Text Block</option>
                                        <option value="b_image">Single Image Block</option>
                                        <option value="b_two_image">Two Images Block</option>
                                        <option value="b_video">Video Block</option>
                                    </optgroup>
                                </select>
                            </div>
                            <button class="btn btn-success" id="addBlockButton" type="button">Add block</button>
                        </div>

                        <form action="{{ route('blocks.store') }}" id="blocks-form" method="POST" class="form-edit-add">
                            {{ csrf_field() }}
                            <div id="WHITEaccordion" role="tablist" aria-multiselectable="true" class="list-group">
                                @if(isset($dataTypeContent->id))
                                    @foreach($dataTypeContent->getWhiteBlocks() as $block)
                                        @php($type = $block->type)
                                        @switch($type)
                                            @case('text')
                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading' + count + '">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} TEXT Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">

                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="text">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Title RU</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_ru]"
                                                                   value="{{ $block->title_ru }}"
                                                                   placeholder="Title RU">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Title EN</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_en]"
                                                                   value="{{ $block->title_en }}"
                                                                   placeholder="Title EN">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Body RU</label>
                                                            <textarea class="form-control blockTextBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Body RU">{!! $block->body_ru !!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Body EN</label>
                                                            <textarea class="form-control blockTextBox"
                                                                      name="blocks[{{ $globalCount }}][body_en]"
                                                                      placeholder="Body EN">{!! $block->body_en !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>

                                            @break

                                            @case('image')
                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }} ">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} SINGLE IMAGE Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="image">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Image</label>
                                                            <textarea class="form-control blockImgBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Image">{!! $block->body_ru !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>
                                            @break

                                            @case('two_image')

                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }}">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} TWO IMAGE Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="two_image">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Image</label>
                                                            <textarea class="form-control blockImgBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Image">{!! $block->body_ru !!}</textarea>
                                                            <textarea class="form-control blockImgBox"
                                                                      name="blocks[{{ $globalCount }}][body_en]"
                                                                      placeholder="Image">{!! $block->body_en !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>

                                            @break
                                        @endswitch
                                        @php($globalCount++)

                                    @endforeach
                                @endif
                            </div>
                            <div id="BLACKaccordion" role="tablist" aria-multiselectable="true" class="list-group">
                                @if(isset($dataTypeContent->id))
                                    @foreach($dataTypeContent->getBlackBlocks() as $block)
                                        @php($type = $block->type)
                                        @switch($type)
                                            @case('list')

                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }}">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} LIST Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="list">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Title RU</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_ru]"
                                                                   value="{{ $block->title_ru }}"
                                                                   placeholder="Title RU">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Title EN</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_en]"
                                                                   value="{{ $block->title_en }}"
                                                                   placeholder="Title EN">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Body RU</label>
                                                            <textarea class="form-control listBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Body RU">{!! $block->body_ru !!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Body EN</label>
                                                            <textarea class="form-control listBox"
                                                                      name="blocks[{{ $globalCount }}][body_en]"
                                                                      placeholder="Body EN">{!! $block->body_en !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>

                                            @break

                                            @case('text')
                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }}">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} TEXT Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="text">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Title RU</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_ru]"
                                                                   value="{{ $block->title_ru }}"
                                                                   placeholder="Title RU">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Title EN</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_en]"
                                                                   value="{{ $block->title_en }}"
                                                                   placeholder="Title EN">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Body RU</label>
                                                            <textarea class="form-control blockTextBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Body RU">{!! $block->body_ru !!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Body EN</label>
                                                            <textarea class="form-control blockTextBox"
                                                                      name="blocks[{{ $globalCount }}][body_en]"
                                                                      placeholder="Body EN">{!! $block->body_en !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>

                                            @break

                                            @case('image')
                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }} ">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} SINGLE IMAGE Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="image">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }} ">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Image</label>
                                                            <textarea class="form-control blockImgBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Image">{!! $block->body_ru !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>
                                            @break

                                            @case('two_image')
                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }} ">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} TWO IMAGE Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="two_image">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Image</label>
                                                            <textarea class="form-control blockImgBox"
                                                                      name="blocks[{{ $globalCount }}][body_ru]"
                                                                      placeholder="Image">{!! $block->body_ru !!}</textarea>
                                                            <textarea class="form-control blockImgBox"
                                                                      name="blocks[{{ $globalCount }}][body_en]"
                                                                      placeholder="Image">{!! $block->body_en !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>

                                            @break

                                            @case('video')
                                            <div class="card list-group-item">
                                                <div class="card-header" role="tab" id="heading{{ $globalCount }} ">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#{{ $block->color }}accordion"
                                                           href="#collapse{{ $globalCount }}" aria-expanded="false"
                                                           aria-controls="collapse{{ $globalCount }}">
                                                            <span class="glyphicon glyphicon-move"
                                                                  aria-hidden="true"></span>
                                                            {{ $block->color }} VIDEO Block
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $globalCount }}" class="collapse" role="tabpanel"
                                                     aria-labelledby="heading{{ $globalCount }}">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][id]"
                                                                   value="{{ $block->id }}">
                                                            <input type="hidden" name="blocks[{{ $globalCount }}][type]"
                                                                   value="two_image">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][color]"
                                                                   value="{{ $block->color }}">
                                                            <input type="hidden"
                                                                   name="blocks[{{ $globalCount }}][order]"
                                                                   value="{{ $block->order }}" class="order">
                                                            <label for="name">Video URL</label>
                                                            <input type="text" class="form-control"
                                                                   name="blocks[{{ $globalCount }}][title_ru]"
                                                                   value="{!! $block->title_ru !!}">
                                                        </div>
                                                    </div>
                                                    <i class="voyager-trash"></i>
                                                </div>
                                            </div>
                                            @break

                                        @endswitch
                                        @php($globalCount++)

                                    @endforeach
                                @endif
                            </div>
                        </form>
                    </div>
                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager.generic.are_you_sure') }}
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager.generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager.generic.delete') }}</button>
                    <button type="button" class="btn btn-danger"
                            id="confirm_delete">{{ __('voyager.generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <!-- Latest Sortable -->
    <script src="//rubaxa.github.io/Sortable/Sortable.js"></script>
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function (i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug: '{{ $dataTypeContent->getTable() }}',
                    image: $image.data('image'),
                    id: $image.data('id'),
                    field: $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function () {
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if (response
                        && response.data
                        && response.data.status
                        && response.data.status == 200) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function () {
                            $(this).remove();
                        })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
        var count = parseInt('{{ $globalCount }}');
        var template;
        var color;

        function init() {
            tinymce.init({
                menubar: false,
                selector: 'textarea.blockTextBox',
                skin: 'voyager',
                min_height: 200,
                resize: 'vertical',
                plugins: 'link image code youtube giphy table textcolor lists',
                extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
                file_browser_callback: function (field_name, url, type, win) {
                    if (type == 'image') {
                        $('#upload_file').trigger('click');
                    }
                },
                style_formats: [
                    {
                        title: 'Headers', items: [
                        {title: 'Header 1', format: 'h1'},
                        {title: 'Header 2', format: 'h2'},
                        {title: 'Header 3', format: 'h3'},
                        {title: 'Header 4', format: 'h4'},
                        {title: 'Header 5', format: 'h5'},
                        {title: 'Header 6', format: 'h6'}
                    ]
                    },
                    {
                        title: 'Inline', items: [
                        {title: 'Bold', icon: 'bold', format: 'bold'},
                        {title: 'Italic', icon: 'italic', format: 'italic'},
                        {title: 'Underline', icon: 'underline', format: 'underline'},
                        {title: 'Strikethrough', icon: 'strikethrough', format: 'strikethrough'},
                        {title: 'Superscript', icon: 'superscript', format: 'superscript'},
                        {title: 'Subscript', icon: 'subscript', format: 'subscript'},
                        {title: 'Code', icon: 'code', format: 'code'}
                    ]
                    },
                    {
                        title: 'Blocks', items: [
                        {title: 'Paragraph', format: 'p'},
                        {title: 'Blockquote', format: 'blockquote'},
                        {title: 'Div', format: 'div'},
                        {title: 'Div-read-more', block: 'div', classes: 'for-read-more'},
                        {title: 'Pre', format: 'pre'}
                    ]
                    },
                    {
                        title: 'Alignment', items: [
                        {title: 'Left', icon: 'alignleft', format: 'alignleft'},
                        {title: 'Center', icon: 'aligncenter', format: 'aligncenter'},
                        {title: 'Right', icon: 'alignright', format: 'alignright'},
                        {title: 'Justify', icon: 'alignjustify', format: 'alignjustify'}
                    ]
                    }
                ],
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                    editor.addButton('readMoreButton', {
                        text: 'Read More',
                        icon: false,
                        onclick: function () {
                            editor.insertContent('<span class="read-more-btn">читать дальше...</span>');
                        }
                    });
                },
                toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code | readMoreButton',
                image_caption: true,
                image_title: true,
                forced_root_block: false

            });
            tinymce.init({
                menubar: false,
                selector: 'textarea.listBox',
                skin: 'voyager',
                min_height: 200,
                resize: 'vertical',
                plugins: 'code lists',
                extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
                setup:
                    function (editor) {
                        editor.on('change', function () {
                            editor.save();
                        });
                        editor.addButton('class2list', {
                            text: 'Add Class How IT MADE To ul',
                            icon: false,
                            onclick: function () {
                                // Adds a class to a specific element in the current page
                                tinyMCE.activeEditor.dom.addClass(tinyMCE.activeEditor.dom.select('ul'), 'how-it-made-list');
                            }
                        });
                    },
                toolbar: ' bullist  | class2list | code',
                convert_urls: false,
                image_caption: true,
                image_title: true
            });
            tinymce.init({
                menubar: false,
                selector: 'textarea.blockImgBox',
                skin: 'voyager',
                min_height: 100,
                resize: 'vertical',
                plugins: 'image',
                extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
                file_browser_callback: function (field_name, url, type, win) {
                    if (type == 'image') {
                        $('#upload_file').trigger('click');
                    }
                },
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                toolbar: 'image',
                image_dimensions: false,
                image_title: true,
                forced_root_block: false
            });
            Sortable.create(BLACKaccordion, {
                handle: '.glyphicon-move',
                group: 'BLACKaccordion',
                animation: 150,
                onEnd: function (/**Event*/evt) {
                    var itemEl = evt.item;  // dragged HTMLElement
                    var newIndex = evt.newIndex;
                    console.log($(itemEl).find('.order').val(newIndex));
                }
            });
            Sortable.create(WHITEaccordion, {
                handle: '.glyphicon-move',
                group: 'WHITEaccordion',
                animation: 150,
                onEnd: function (/**Event*/evt) {
                    var itemEl = evt.item;  // dragged HTMLElement
                    var newIndex = evt.newIndex;
                    console.log($(itemEl).find('.order').val(newIndex));
                }
            });
        }

        function deleteBlock() {
            $('.voyager-trash').on('click', function () {
                $(this).parent().parent().remove();
            })
        }


        $('#addBlockButton').on('click', function () {
            count++;
            var type = $('#selectBlockType').val();

            if (type.includes('w_')) {
                color = 'WHITE';
            } else {
                color = 'BLACK';
            }

            var textTemplate = '<div class="card list-group-item">\n' +
                '    <div class="card-header" role="tab" id="heading' + count + '">\n' +
                '      <h5 class="mb-0">\n' +
                '        <a class="collapsed" data-toggle="collapse" data-parent="#' + color + 'accordion" href="#collapse' + count + '" aria-expanded="false" aria-controls="collapse' + count + '">\n' +
                '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>' +
                '          ' + color + ' TEXT Block \n' +
                '        </a>\n' +
                '      </h5>\n' +
                '    </div>\n' +
                '    <div id="collapse' + count + '" class="collapse" role="tabpanel" aria-labelledby="heading' + count + '">\n' +
                '      <div class="card-block">\n' +
                '<div class="form-group">\n' +
                '<input type="hidden" name="blocks[' + count + '][id]" value="">\n' +
                '<input type="hidden" name="blocks[' + count + '][type]" value="text">' +
                '<input type="hidden" name="blocks[' + count + '][color]" value="' + color + '">' +
                '<input type="hidden" name="blocks[' + count + '][order]"  value="' + count + '" class="order">' +
                '<label for="name">Title RU</label>\n' +
                '<input type="text" class="form-control" name="blocks[' + count + '][title_ru]" placeholder="Title RU">\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="name">Title EN</label>\n' +
                '<input type="text" class="form-control" name="blocks[' + count + '][title_en]" placeholder="Title EN">\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="name">Body RU</label>\n' +
                '<textarea class="form-control blockTextBox" name="blocks[' + count + '][body_ru]" placeholder="Body RU"></textarea>\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="name">Body EN</label>\n' +
                '<textarea class="form-control blockTextBox" name="blocks[' + count + '][body_en]" placeholder="Body EN"></textarea>\n' +
                '</div>' +
                '</div>\n' +
                '<i class="voyager-trash"></i>' +
                '</div>\n' +
                '</div>';

            var listTemplate = '<div class="card list-group-item">\n' +
                '    <div class="card-header" role="tab" id="heading' + count + '">\n' +
                '      <h5 class="mb-0">\n' +
                '        <a class="collapsed" data-toggle="collapse" data-parent="#' + color + 'accordion" href="#collapse' + count + '" aria-expanded="false" aria-controls="collapse' + count + '">\n' +
                '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>' +
                '          ' + color + ' LIST Block \n' +
                '        </a>\n' +
                '      </h5>\n' +
                '    </div>\n' +
                '    <div id="collapse' + count + '" class="collapse" role="tabpanel" aria-labelledby="heading' + count + '">\n' +
                '      <div class="card-block">\n' +
                '<div class="form-group">\n' +
                '<input type="hidden" name="blocks[' + count + '][id]" value="">\n' +
                '<input type="hidden" name="blocks[' + count + '][type]" value="list">' +
                '<input type="hidden" name="blocks[' + count + '][color]" value="' + color + '">' +
                '<input type="hidden" name="blocks[' + count + '][order]"  value="' + count + '" class="order">' +
                '<label for="name">Title RU</label>\n' +
                '<input type="text" class="form-control" name="blocks[' + count + '][title_ru]" placeholder="Title RU">\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="name">Title EN</label>\n' +
                '<input type="text" class="form-control" name="blocks[' + count + '][title_en]" placeholder="Title EN">\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="name">Body RU</label>\n' +
                '<textarea class="form-control listBox" name="blocks[' + count + '][body_ru]" placeholder="Body RU"></textarea>\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<label for="name">Body EN</label>\n' +
                '<textarea class="form-control listBox" name="blocks[' + count + '][body_en]" placeholder="Body EN"></textarea>\n' +
                '</div>' +
                '</div>\n' +
                '<i class="voyager-trash"></i>' +
                '</div>\n' +
                '</div>';

            var imageTemplate = '<div class="card list-group-item">\n' +
                '    <div class="card-header" role="tab" id="heading' + count + '">\n' +
                '      <h5 class="mb-0">\n' +
                '        <a class="collapsed" data-toggle="collapse" data-parent="#' + color + 'accordion" href="#collapse' + count + '" aria-expanded="false" aria-controls="collapse' + count + '">\n' +
                '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>' +
                '          ' + color + ' SINGLE IMAGE Block \n' +
                '        </a>\n' +
                '      </h5>\n' +
                '    </div>\n' +
                '    <div id="collapse' + count + '" class="collapse" role="tabpanel" aria-labelledby="heading' + count + '">\n' +
                '      <div class="card-block">\n' +
                '<div class="form-group">\n' +
                '<input type="hidden" name="blocks[' + count + '][id]" value="">\n' +
                '<input type="hidden" name="blocks[' + count + '][type]" value="image">' +
                '<input type="hidden" name="blocks[' + count + '][color]" value="' + color + '">' +
                '<input type="hidden" name="blocks[' + count + '][order]"  value="' + count + '"  class="order">' +
                '<label for="name">Image</label>\n' +
                '<textarea class="form-control blockImgBox" name="blocks[' + count + '][body_ru]" placeholder="Image"></textarea>\n' +
                '</div>' +
                '</div>\n' +
                '<i class="voyager-trash"></i>' +
                '</div>\n' +
                '</div>';

            var twoImageTemplate = '<div class="card list-group-item">\n' +
                '    <div class="card-header" role="tab" id="heading' + count + '">\n' +
                '      <h5 class="mb-0">\n' +
                '        <a class="collapsed" data-toggle="collapse" data-parent="#' + color + 'accordion" href="#collapse' + count + '" aria-expanded="false" aria-controls="collapse' + count + '">\n' +
                '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>' +
                color + ' TWO IMAGE Block\n' +
                '        </a>\n' +
                '      </h5>\n' +
                '    </div>\n' +
                '    <div id="collapse' + count + '" class="collapse" role="tabpanel" aria-labelledby="heading' + count + '">\n' +
                '      <div class="card-block">\n' +
                '<div class="form-group">\n' +
                '<span class="glyphicon glyphicon-trash"></span>' +
                '<input type="hidden" name="blocks[' + count + '][id]" value="">\n' +
                '<input type="hidden" name="blocks[' + count + '][type]" value="two_image">' +
                '<input type="hidden" name="blocks[' + count + '][color]" value="' + color + '">' +
                '<input type="hidden" name="blocks[' + count + '][order]" value="' + count + '"  class="order">' +
                '<label for="name">LEFT Image</label>\n' +
                '<textarea class="form-control blockImgBox" name="blocks[' + count + '][body_ru]" placeholder="Image"></textarea>\n' +
                '</div>' +
                '<div class="form-group">\n' +
                '<input type="hidden" name="block[]type" value="' + type + '">' +
                '<label for="name">RIGHT Image</label>\n' +
                '<textarea class="form-control blockImgBox" name="blocks[' + count + '][body_en]" placeholder="Image"></textarea>\n' +
                '</div>' +
                '</div>\n' +
                '<i class="voyager-trash"></i>' +
                '</div>\n' +
                '</div>';

            var videoTemplate = '<div class="card list-group-item">\n' +
                '    <div class="card-header" role="tab" id="heading' + count + '">\n' +
                '      <h5 class="mb-0">\n' +
                '        <a class="collapsed" data-toggle="collapse" data-parent="#' + color + 'accordion" href="#collapse' + count + '" aria-expanded="false" aria-controls="collapse' + count + '">\n' +
                '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>' +
                '          ' + color + ' Video Block \n' +
                '        </a>\n' +
                '      </h5>\n' +
                '    </div>\n' +
                '    <div id="collapse' + count + '" class="collapse" role="tabpanel" aria-labelledby="heading' + count + '">\n' +
                '      <div class="card-block">\n' +
                '<div class="form-group">\n' +
                '<input type="hidden" name="blocks[' + count + '][id]" value="">\n' +
                '<input type="hidden" name="blocks[' + count + '][type]" value="video">' +
                '<input type="hidden" name="blocks[' + count + '][color]" value="' + color + '">' +
                '<input type="hidden" name="blocks[' + count + '][order]" value="' + count + '" class="order">' +
                '<label for="name">Video URL</label>\n' +
                '<input type="text" class="form-control" name="blocks[' + count + '][title_ru]" placeholder="www.vimeo...">\n' +
                '</div>' +
                '</div>\n' +
                '<i class="voyager-trash"></i>' +
                '</div>\n' +
                '</div>';

            if (type.includes('text')) {
                template = textTemplate;
            } else if (type.includes('two')) {
                template = twoImageTemplate;
            } else if (type.includes('video')) {
                template = videoTemplate;
            } else if (type.includes('image')) {
                template = imageTemplate;
            } else if (type.includes('list')) {
                template = listTemplate;
            }

            $('#' + color + 'accordion').append(template);

            init();
            deleteBlock();
        });

        deleteBlock();
        init();

        $('#service-safe').on('click', function (ev) {
            ev.preventDefault();
            $.ajax({
                url: '{{ route('blocks.store') }}',
                method: 'POST',
                data: $('#blocks-form').serialize(),
                success: function (data) {
                    $("#block_ids").find('input').val(data);

                    $('#main-form').submit();
                },
                error: function () {
                    alert('Please add blocks');
                }
            });
        });

    </script>
@stop
