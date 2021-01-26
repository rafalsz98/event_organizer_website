@props(['event', 'active' => '1'])
@php
            $photos=$event->images()->get();
            $text = substr($event->description, 0, 250) . '...';
            $url = count($photos) == 0
                ? asset('/images/pale-list-is-empty.png')
                : "data:image/jpeg;base64, " . $photos[0]->image;
            $opacity = $active == 0
                ? 'opacity-60'
                : '';
@endphp

<div class="w-full lg:w-4/6 h-96 transition-all duration-150 flex bg-gray-50 bg-white rounded-lg shadow mb-8 relative pr-0 lg:pr-32 {{$opacity}}">

    <a href=/events/{{$event->id}}" class="flex justify-center items-center overflow-hidden w-0 sm:w-full bg-cover bg-center rounded-l-xl" style="background-image: url('{{$url}}');"></a>

    <div class=" w-full items-stretch min-h-full pb-2 mb-1 transition-all duration-150 ">
        <div class="items-center flex-1 px-4 mx-auto my-2">
            <p class="self-end text-xl font-bold tracking-normal text-gray-800">
                <a href=/events/{{$event->id}}">{{$event->name}}</a>
                @if ($active == 0)
                    <p class="text-red-700 inline float-left">THIS EVENT HAS ALREADY PASSED</p>
                @endif
            </p>
            <p class="flex flex-row flex-wrap w-full  text-sm text-gray-700">
                Date: {{$event->datestart->format('d.m.Y')}}, time: {{$event->datestart->format('H:i')}}
            </p>
            <p class="flex flex-row flex-wrap w-full text-sm text-justify text-gray-700">
                Place: {{$event->place}}
            </p>
            <hr class="border-gray-300 mb-2" />
        </div>

        <div class="w-full px-4 py-1 overflow-auto text-sm text-justify text-gray-700">

            <div class="w-full">
                {{$text}}
            </div>

            <hr class="border-gray-300 mt-2" />
            <div class="flex flex-row w-full mt-5">
                <p class="px-2">{{$event->current_participants}}/{{$event->max_participants}} participants,</p>
                <p class="px-2">price: {{$event->price}} pln</p>
            </div>
        </div>
        <a href="/events/{{$event->id}}" class="float-right mx-5 opacity-70 absolute bottom-5">
            <div class="flex flex-row items-center justify-center">
                <img src="{{asset('/images/details.png')}}">
                <p class="ml-1">Details</p>
            </div>
        </a>
    </div>
</div>

