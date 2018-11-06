@extends('voyager::master')

@section('css')
<style>
.panel .mce-panel {
    border-left-color: #fff;
    border-right-color: #fff;
}

.panel .mce-toolbar,
.panel .mce-statusbar {
    padding-left: 20px;
}

.panel .mce-edit-area,
.panel .mce-edit-area iframe,
.panel .mce-edit-area iframe html {
    padding: 0 10px;
    min-height: 350px;
}

.mce-content-body {
    color: #555;
    font-size: 14px;
}

.panel.is-fullscreen .mce-statusbar {
    position: absolute;
    bottom: 0;
    width: 100%;
    z-index: 200000;
}

.panel.is-fullscreen .mce-tinymce {
    height:100%;
}

.panel.is-fullscreen .mce-edit-area,
.panel.is-fullscreen .mce-edit-area iframe,
.panel.is-fullscreen .mce-edit-area iframe html {
    height: 100%;
    position: absolute;
    width: 99%;
    overflow-y: scroll;
    overflow-x: hidden;
    min-height: 100%;
}
</style>
@stop

@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
<h1 class="page-title">
    <i class="{{ $dataType->icon }}"></i>
    {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content container-fluid">
    <form role="form"
    class="form-edit-add"
    action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
    method="POST" enctype="multipart/form-data">
    <!-- PUT Method if we are editing -->
    @if(!is_null($dataTypeContent->getKey()))
    {{ method_field("PUT") }}
    @endif

    <!-- CSRF TOKEN -->
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-8">
            <!-- ### TITLE ### -->
            <div class="panel">
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
                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
                @endphp

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="voyager-character"></i> Name
                        {{-- <span class="panel-desc"> {{ __('voyager::products.title_sub') }}</span> --}}
                    </h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                   {{--  @foreach($dataTypeRows as $row)
                    <!-- GET THE DISPLAY OPTIONS -->
                    @php
                    $display_options = isset($row->details->display) ? $row->details->display : NULL;
                    @endphp
                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                    <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ isset($display_options->width) ? $display_options->width : 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>

                    </div>
                    @endforeach --}}

                    <div class="form-group">

                        @include('voyager::multilingual.input-hidden', [
                            '_field_name'  => 'name',

                            ])
                            <input type="text" class="form-control" id="name" name="name"
                            placeholder="name"
                            {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "name") !!}
                            value="@if(isset($dataTypeContent->name)){{ $dataTypeContent->name }}@endif">
                        </div>
                    </div>
                </div>

                <!-- ### CONTENT ### -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Description</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        @include('voyager::multilingual.input-hidden', [
                            '_field_name'  => 'description',

                            ])
                        @php
                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                        $row = $dataTypeRows->where('field', 'description')->first();
                        @endphp
                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                    </div>
                </div><!-- .panel -->

                <!-- ### EXCERPT ### -->
                    {{-- <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{!! __('voyager::products.excerpt') !!}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('voyager::multilingual.input-hidden', [
                                '_field_name'  => 'excerpt',
                                '_field_trans' => get_field_translations($dataTypeContent, 'excerpt')
                            ])
                            <textarea class="form-control" name="excerpt">@if (isset($dataTypeContent->excerpt)){{ $dataTypeContent->excerpt }}@endif</textarea>
                        </div>
                    </div> --}}

                </div>

                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Product Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'slug',
                                    
                                    ])
                                    <input type="text" class="form-control" id="slug" name="slug"
                                    placeholder="slug"
                                    {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}
                                    value="@if(isset($dataTypeContent->slug)){{ $dataTypeContent->slug }}@endif">
                                </div>
                                
                                <div class="form-group">
                                    <label for="category_id">{{ __('voyager::post.category') }}</label>
                                    @foreach($dataTypeRows as $row)
                                    @if($row->type == 'relationship')
                                    @include('voyager::formfields.relationship', ['options' => $row->details])  
                                    @endif
                                    @endforeach
                                </div>  

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    @include('voyager::multilingual.input-hidden', [
                                        '_field_name'  => 'quantity',

                                        ])
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                        placeholder="quantity"
                                        {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "quantity") !!}
                                        value="@if(isset($dataTypeContent->quantity)){{ $dataTypeContent->quantity }}@endif">
                                    </div> 
                                </div>
                            </div>



                            <!-- ### MORE DETAILS ### -->
                            <div class="panel panel-bordered panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon wb-search"></i>More Details</h3>
                                    <div class="panel-actions">
                                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="slug">Price</label>
                                        @include('voyager::multilingual.input-hidden', [
                                            '_field_name'  => 'price',

                                            ])
                                            <input type="text" class="form-control" id="price" name="price"
                                            placeholder="price"
                                            {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "price") !!}
                                            value="@if(isset($dataTypeContent->price)){{ $dataTypeContent->price }}@endif">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Size</label>
                                            @include('voyager::multilingual.input-hidden', [
                                                '_field_name'  => 'size',

                                                ])
                                                <input type="text" class="form-control" id="size" name="size"
                                                placeholder="size"
                                                {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "size") !!}
                                                value="@if(isset($dataTypeContent->size)){{ $dataTypeContent->size }}@endif">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Color</label>
                                                @include('voyager::multilingual.input-hidden', [
                                                    '_field_name'  => 'color',

                                                    ])
                                                    <input type="text" class="form-control" id="color" name="color"
                                                    placeholder="color"
                                                    {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "color") !!}
                                                    value="@if(isset($dataTypeContent->color)){{ $dataTypeContent->color }}@endif">
                                                </div>  
                                            </div>
                                        </div>

                                        <!-- ### IMAGE ### -->
                                        <div class="panel panel-bordered panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::post.image') }}</h3>
                                                <div class="panel-actions">
                                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                @if(isset($dataTypeContent->image))
                                                <img src="{{ filter_var($dataTypeContent->image, FILTER_VALIDATE_URL) ? $dataTypeContent->image : Voyager::image( $dataTypeContent->image ) }}" style="width:100%; height: 10%" />
                                                @endif
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">
                                    @if(isset($dataTypeContent->id)){{ __('voyager::post.update') }}@else <i class="icon wb-plus-circle"></i> {{ __('voyager::post.new') }} @endif
                                </button>
                            </form>

                            <iframe id="form_target" name="form_target" style="display:none"></iframe>
                            <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                                {{ csrf_field() }}
                                <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                                <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                            </form>
                        </div>
                        @stop

                        @section('javascript')
                        <script>
                            $('document').ready(function () {
                                $('#slug').slugify();

                                @if ($isModelTranslatable)
                                $('.side-body').multilingual({"editing": true});
                                @endif
                            });
                        </script>
                        @stop
