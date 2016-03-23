@if(slideshow()->count() > 0)
<div id="bg-slider">
    <div id="da-slider" class="flexslider">
        <ul class="slides">
            @foreach (slideshow() as $val) 
            <li>
                @if(!empty($val->url))
                <a href="{{filter_link_url($val->url)}}" target="_blank">
                @else
                <a href="#">
                @endif
                    <img src="{{slide_image_url($val->gambar)}}" alt="{{ $val->title }}" />
                </a>
            </li>
            @endforeach 
        </ul>
    </div>
</div>
@endif