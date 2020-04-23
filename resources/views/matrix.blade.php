@extends('shop::layouts.master')
@section('content-wrapper')
<main>
    <ul class="header_social mobile_social">
        <li class="languages">
            <a href="javascript:;" class="arm_icon" style="background-image: url('assets/icons/ge.png')"></a>
            <a href="javascript:;" class="eng_icon" style="background-image: url('assets/icons/en.png')"></a>
            <a href="javascript:;" class="rus_icon" style="background-image: url('assets/icons/ru.png')"></a>
        </li>
        <li class="social">
            <a href="javascript:;" class="facebook_icon" style="background-image: url('assets/icons/facebook-icon.png')"></a>
            <a href="javascript:;" class="youtube_icon" style="background-image: url('assets/icons/youtube-icon.png')"></a>
            <a href="javascript:;" class="instagram_icon" style="background-image: url('assets/icons/instagram-icon.png')"></a>
        </li>
    </ul>
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