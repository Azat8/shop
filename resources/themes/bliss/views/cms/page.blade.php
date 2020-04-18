@extends('shop::layouts.master')

@section('page_title')
    {{ $page->page_title }}
@endsection
@section('seo')
    <meta name="title" content="{{ $page->meta_title }}" />

    <meta name="description" content="{{ $page->meta_description }}" />

    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@endsection

@section('content-wrapper')
    {!! DbView::make($page)->field('html_content')->render() !!}

<script>
  function initMap() {
    var location = {lat: 40.2, lng: 44.55};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: location
    });
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }

</script>
<script async="" defer=""
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7nSpucMaZeeBRk9JbmLZkVWQx4L8fLgs&amp;callback=initMap"
        type="text/javascript"></script>
</body>
	
@endsection