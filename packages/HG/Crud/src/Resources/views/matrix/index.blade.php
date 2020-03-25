@extends('admin::layouts.content')

@section('page_title')
    {{ __('crud::app.matrix.title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('crud::app.matrix.title') }}</h1>
            </div>

            <div class="page-action">
                <a href="{{ route('matrix.create') }}" class="btn btn-lg btn-primary">
                    {{ __('crud::app.matrix.add-matrix') }}
                </a>
            </div>
        </div>

        {!! view_render_event('bagisto.admin.catalog.categories.list.before') !!}

        <div class="page-content">
            {!! app('HG\Crud\DataGrids\MatrixDataGrid')->render() !!}
        </div>

        {!! view_render_event('bagisto.admin.catalog.categories.list.after') !!}
    </div>
@stop
