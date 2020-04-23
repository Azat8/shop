@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.catalog.categories.edit-title') }}
@stop

@section('content')
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>

        <form method="POST" action="" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('crud::app.matrix.edit-title') }}
                    </h1>

                    <div class="control-group">
                        <select class="control" id="locale-switcher" onChange="window.location.href = this.value">
                            @foreach (core()->getAllLocales() as $localeModel)

                                <option value="{{ route('matrix.update', $matrix->id) . '?locale=' . $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                    {{ $localeModel->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('crud::app.matrix.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <input name="_method" type="hidden" value="PUT">

                    {!! view_render_event('bagisto.admin.catalog.category.edit_form_accordian.general.before', ['matrix' => $matrix]) !!}

                    <accordian :title="'{{ __('admin::app.catalog.categories.general') }}'" :active="true">
                        <div slot="body">

                            {!! view_render_event('bagisto.admin.catalog.category.edit_form_accordian.general.controls.before', ['matrix' => $matrix]) !!}

                            <div class="control-group" :class="[errors.has('{{$locale}}[name]') ? 'has-error' : '']">
                                <label for="name" class="required">{{ __('admin::app.catalog.categories.name') }}</label>
                                <input type="text" v-validate="'required'" class="control" id="name" name="{{$locale}}[name]" value="{{ old($locale)['name'] ?? $matrix->translate($locale)['name'] }}" data-vv-as="&quot;{{ __('admin::app.catalog.categories.name') }}&quot;" v-slugify-target="'slug'"/>
                                <span class="control-error" v-if="errors.has('{{$locale}}[name]')">@{{ errors.first('{!!$locale!!}[name]') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('file') ? 'has-error' : '']">
                                <label for="file" class="required">{{ __('admin::app.export.file') }}</label>
                                <a target="_blank" href="/storage/{{ $matrix->file }}">{{ __('crud::app.matrix.see-file') }}</a>
                                <br>
                                <input v-validate="'required'" type="file" class="control" id="file" name="file[]" data-vv-as="&quot;{{ __('admin::app.export.file') }}&quot;" value="{{ old('file') }}" style="padding-top: 5px">
                                <span>{{ __('admin::app.export.allowed-type') }}</span>
                                <span><b>{{ __('crud::app.matrix.file-type') }}</b></span>

                                <span class="control-error" v-if="errors.has('file')">@{{ errors.first('file') }}</span>
                            </div>

                            <div class="control-group {!! $errors->has('image.*') ? 'has-error' : '' !!}">
                                <label>{{ __('admin::app.catalog.categories.image') }}</label>
                                <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="image" :multiple="false"  :images='"/storage/{{ $matrix->image }}"'></image-wrapper>

                                <span class="control-error" v-if="{!! $errors->has('image.*') !!}">
                                    @foreach ($errors->get('image.*') as $key => $message)
                                        @php echo str_replace($key, 'Image', $message[0]); @endphp
                                    @endforeach
                                </span>
                            </div>


                            {!! view_render_event('bagisto.admin.catalog.category.edit_form_accordian.general.controls.after', ['matrix' => $matrix]) !!}

                        </div>
                    </accordian>

                    {!! view_render_event('bagisto.admin.catalog.category.edit_form_accordian.general.after', ['matrix' => $matrix]) !!}

                </div>
            </div>

        </form>
    </div>
@stop
