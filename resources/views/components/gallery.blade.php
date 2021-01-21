@props(['event'])

@php

$photos=$event->images()->get();

$count=count($photos);

@endphp

<style>

    .carousel-open:checked + .carousel-item {
        position: relative;
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
<x-icons.calendar class="w-1/2"/>
@elseif($count==1)
    <img src="data:image/jpeg;base64, {{$photos[0]->image}}" class="w-full"/>
@else
    <div class="carousel relative">
        <div class="carousel-inner relative overflow-hidden  ">

            @for($i=1;$i<=$count;$i++)
                <input class="carousel-open absolute" type="radio" id="carousel-{{$i}}" name="carousel" aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item absolute opacity-0">
                        <img src="data:image/jpeg;base64, {{$photos[$i-1]->image}}" class="w-full"/>
                </div>
                <label for="carousel-{{($i==1)?$count:$i-1}}" class="prev control-{{$i}}  w-6 h-6 sm:h-10 sm:w-10 ml-2 absolute cursor-pointer hidden text-lg sm:text-3xl lg:text-4xl font-bold text-black rounded-full bg-white leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-{{ ($i==$count)?1:$i+1}}" class="next control-{{$i}} w-6 h-6 sm:h-10 sm:w-10 mr-2 absolute cursor-pointer hidden text-lg sm:text-3xl lg:text-4xl font-bold text-black rounded-full bg-white  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            @endfor

        </div>
    </div>
@endif

