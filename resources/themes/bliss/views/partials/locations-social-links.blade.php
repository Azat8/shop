<ul class="header_social {{isset($class) ? $class : ''}}">
	<li class="languages">
        @foreach (core()->getCurrentChannel()->locales()->orderBy('id', 'desc')->get() as $locale)
            <a href="?locale={{ $locale->code }}" class="arm_icon" style="background-image: url(/storage/{{$locale->locale_image}})"></a>
        @endforeach
    </li>

    <li class="social">
        {!!core()->getCurrentChannel()->description!!}
    </li>                    
</ul>