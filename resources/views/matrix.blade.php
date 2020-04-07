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
        <li><a href="index.html">Главная</a></li>
        <li><a href="matrix.html">Матрица</a></li>
    </ul>
    <div class="matrix_container">
        <h1>МАТРИЦА ОБРАБОТКИ ПОЛОВ</h1>
        <h2>Выберите правильный HG продукт для пола!</h2>
        <p>С помощью HG очень легко выбрать правильный продукт для решения вашей проблемы по уходу за полами!
            Сторона каждой бутылки объемом 1 литр имеет матрицу для применения, разработанную специально для данного
            типа пола. Каждое применение относится к специальному номеру продукта HG, который соответствует уникальному
            номеру на передней части соответствующего продукта.
            Вы можете найти все матрицы применения на этом сайте. Нажмите на одно из изображений ниже, и вы увидите
            матрицу применения для этого пола. Выберите необходимое применение, и все, что вам нужно сделать, это
            запомнить код продукта HG, чтобы выбрать правильный продукт с полки HG в магазине.</p>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 col-lg-4">
                    <a href="javascript:;" class="matrix_content">
                        <i style="background-image: url('assets/matrix/matrix1.png')"></i>
                        <p>ПЛИТКИ</p>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="javascript:;" class="matrix_content">
                        <i style="background-image: url('assets/matrix/matrix2.png')"></i>
                        <p>ПЛИТКИ</p>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="javascript:;" class="matrix_content">
                        <i style="background-image: url('assets/matrix/matrix3.png')"></i>
                        <p>ПЛИТКИ</p>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="javascript:;" class="matrix_content">
                        <i style="background-image: url('assets/matrix/matrix4.png')"></i>
                        <p>ПЛИТКИ</p>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="javascript:;" class="matrix_content">
                        <i style="background-image: url('assets/matrix/matrix5.png')"></i>
                        <p>ПЛИТКИ</p>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="javascript:;" class="matrix_content">
                        <i style="background-image: url('assets/matrix/matrix6.png')"></i>
                        <p>ПЛИТКИ</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection