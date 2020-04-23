@extends('shop::layouts.master')
@section('content-wrapper')
<main>
    <ul class="breadcrumb_navigation">
        <li><a href="/">{{__('app.home')}}</a></li>
        <li><a href="javascript:;">{{__('app.matrix')}}</a></li>
    </ul>
    <div class="matrix_container">
        <h1>{{__('app.matrix_title')}}</h1>
        <h2>{{__('app.matrix_sub_title')}}</h2>
        <p>{{__('app.matrix_text')}}</p>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                @foreach($matrix as $m)
                    <div class="col-sm-6 col-lg-4">
                        <a href="/storage/{{$m->file}}" class="matrix_content" target="_blank">
                            <i style="background-image: url(/storage/{{$m->image}})"></i>
                            <p>{{$m->name}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection