@props(['event'])
@php
            $bought = DB::table('tickets')->where(['event_id'=>$event->id, 'user_id'=>Auth::id()])->exists();
            $observed = DB::table('observers')->where(['event_id'=>$event->id, 'user_id'=>Auth::id()])->exists();
            $is_owner=Auth::id() !== $event->user_id;
@endphp


<section class="flex flex-row flex-wrap font-mono">

    <div style="width: 100%; margin:0 auto; margin-bottom: 25px;"  class="transition-all duration-150 flex bg-gray-50 bg-white rounded-lg shadow">

        <div style="width:300px; height:300px; display: flex; align-items: center; ">
            <a href=/events/{{$event->id}}"><x-gallery :event="$event" />
        </div>

        <div class=" w-full items-stretch min-h-full pb-2 mb-1 transition-all duration-150 ">

            <div style="margin-top: 20px; " class="items-center flex-1 px-4   mx-auto">
                <p class="self-end text-xl font-bold tracking-normal text-gray-800"><a href=/events/{{$event->id}}">{{$event->name}}</a></p>

                <p class="flex flex-row flex-wrap w-full  text-sm text-gray-700">
                    Date: {{$event->datestart->format('d.m.Y')}}, time: {{$event->datestart->format('H:i')}}
                </p>

                <p class="flex flex-row flex-wrap w-full text-sm text-justify text-gray-700">
                    Place: {{$event->place}}
                </p>

                <hr style="margin: 5px;" class="border-gray-300" />
            </div>

            <div class="w-full px-4 py-1 overflow-auto text-sm text-justify text-gray-700">

                <div class="w-full">
                    {{$event->description}}
                </div>

                <hr style="margin: 5px;"  class="border-gray-300" />

                <div   class="flex flex-row w-full">
                    <p class="px-2">{{$event->current_participants}}/{{$event->max_participants}} participants,</p>
                    <p class="px-2">price: {{$event->price}} pln</p>

                </div>

            </div>
            <div class="text-align: right; px-4 py-1 overflow-auto text-sm  text-gray-700">
            @if( $bought)
            <a href="{{route('events.ticket',$event)}}">Download ticket</a>
        @else
            @if( $observed)
                <a href="{{route('events.unobserve',$event)}}">Unobserve</a>
                <br>
            @else
                <form action="{{route('events.observe',$event)}}" method="POST">
                    @csrf
                    <button>Observe</button>
                </form>
            @endif

            <a href="{{route('events.buy',$event)}}">Buy</a>
        @endif
        </div>
        </div>
    </div>
</section>

