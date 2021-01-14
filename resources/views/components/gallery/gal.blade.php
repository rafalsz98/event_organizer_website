@props(['event', 'class'])

@php

$images=$event->images()->get();

$photos=array($images[0],$images[1]);

@endphp

{{--<div class="{{$class ?? ''}}">

    @foreach($images as $image)
        <img src="data:image/jpeg;base64, {{$image->image}}"/>
    @endforeach

</div>--}}

<div class="home-slideshow">
    <div id="home_main-slider" class="carousel slide  main-slider">
        <ol class="carousel-indicators">
            <li data-target="#home_main-slider" data-slide-to="0" class="carousel-1"></li>
        </ol>
        <div class="carousel-inner">


        @foreach($photos as $photo)
            <!-- slider images -->
                <div class="item image active">
                    <img src="{{url('/')}}/images/{{$photo->image}}" height="362" itle="Image Slideshow">
                    <div class="slideshow-caption position-right">
                        <div class="slide-caption">
                            <div class="group-caption">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider images -->
            @endforeach


        </div>
        <a class="left carousel-control" href="#home_main-slider" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#home_main-slider" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
</div>

{{--
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-in ner">
        <div class="carousel-item active">
            <img src="data:image/jpeg;base64, {{$images[0]->image}}" class="d-block w-100" >
        </div>
        <div class="carousel-item">
            <img src="data:image/jpeg;base64, {{$images[1]->image}}" class="d-block w-100" >
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
--}}
