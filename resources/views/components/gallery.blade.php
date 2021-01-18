@props(['event', 'class'])

@php

$photos=$event->images()->get();

$count=count($photos);

@endphp

<style>

    .carousel-open:checked + .carousel-item {
        position: static;
        opacity: 100;
    }

    .carousel-item {
        -webkit-transition: opacity 0.6s ease-out;
        transition: opacity 0.6s ease-out;
    }

    @php
        for($i=1;$i<=$count;$i++)
        echo "#carousel-$i:checked ~ .control-$i{display: block;}";
    @endphp

</style>

@if($count==0)
    <h1>No pictures</h1>
@elseif($count==1)
    <img src="data:image/jpeg;base64, {{$photos[0]->image}}"/>
@else
    <div class="carousel relative">
        <div class="carousel-inner relative overflow-hidden w-full">

            @for($i=1;$i<=$count;$i++)

                <input class="carousel-open " type="radio" id="carousel-{{$i}}" name="carousel" aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">
                        <img src="data:image/jpeg;base64, {{$photos[$i-1]->image}}"/>
                    </div>
                </div>
                <label for="carousel-{{($i==1)?$count:$i-1}}" class="prev control-{{$i}} w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-{{ ($i==$count)?1:$i+1}}" class="next control-{{$i}} w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            @endfor

        </div>
    </div>
@endif

