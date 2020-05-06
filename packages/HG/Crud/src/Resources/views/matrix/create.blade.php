@extends('admin::layouts.content')

@section('page_title')
    {{ __('crud::app.matrix.add-matrix') }}
@stop

@section('content')

    <div class="content">

        <form method="POST" action="{{ route('matrix.store') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('crud::app.matrix.add-matrix') }}
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('admin::app.save') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <input type="hidden" name="locale" value="all"/>
                    <accordian :title="'{{ __('admin::app.catalog.categories.general') }}'" :active="true">
                        <div slot="body">

                            {!! view_render_event('bagisto.admin.catalog.category.create_form_accordian.general.controls.before') !!}

                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required">{{ __('admin::app.catalog.categories.name') }}</label>
                                <input type="text" v-validate="'required'" class="control" id="name" name="name" value="{{ old('name') }}" data-vv-as="&quot;{{ __('admin::app.catalog.categories.name') }}&quot;" v-slugify-target="'slug'"/>
                                <span class="control-error" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('file') ? 'has-error' : '']">
                                <label for="file" class="required">{{ __('admin::app.export.file') }}</label>
                                <input v-validate="'required'" type="file" class="control" id="file" name="file[]" data-vv-as="&quot;{{ __('admin::app.export.file') }}&quot;" value="{{ old('file') }}" style="padding-top: 5px">
                                <span>{{ __('admin::app.export.allowed-type') }}</span>
                                <span><b>{{ __('crud::app.matrix.file-type') }}</b></span>
                                <span class="control-error" v-if="errors.has('file')">@{{ errors.first('file') }}</span>
                            </div>

                            <div class="control-group {!! $errors->has('image.*') ? 'has-error' : '' !!}">
                                <label>{{ __('admin::app.catalog.categories.image') }}</label>

                                <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="image" :multiple="false"></image-wrapper>

                                <span class="control-error" v-if="{!! $errors->has('image.*') !!}">
                                    @foreach ($errors->get('image.*') as $key => $message)
                                        @php echo str_replace($key, 'Image', $message[0]); @endphp
                                    @endforeach
                                </span>

                            </div>

                            {!! view_render_event('bagisto.admin.catalog.category.create_form_accordian.general.controls.after') !!}

                        </div>
                    </accordian>
                </div>
            </div>

        </form>
    </div>
@stop

@push('scripts')

@endpush
