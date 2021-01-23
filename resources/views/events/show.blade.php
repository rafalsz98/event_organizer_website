<x-layouts.default>

    <div class="grid lg:grid-cols-5">
        <div class="text-6xl  col-start-2 lg:col-start-1 xl:col-start-2 pb-6">
            {{$event->name}}
        </div>
    </div>

    <div class="grid grid-cols-1 gap-y-5 md:gap-y-10 lg:grid-cols-5 lg:gap-x-10 lg:gap-y-15 ">

        <div class="lg:col-span-4 xl:col-start-2 xl:col-span-3 shadow-md bg-white rounded-lg">
            <x-gallery :event="$event"/>
        </div>

        <div class="text-sm md:text-md xl:text-lg bg-white px-4 py-4 text-gray-400 stroke-current fill-current sticky top-10 self-start shadow-md rounded-lg">
            <div class="flex ">
                <x-icons.calendar class="flex block h-5 pr-2"/>{{ date('Y-m-d H:i',strtotime($event->datestart))  }}
            </div>
            <div class="flex">
                <x-icons.pin class="flex block h-5 pr-2"/>{{$event->place  }}
            </div>

            @if(Auth::id() !== $event->user_id)

                @if( DB::table('observers')->where([
                    'event_id'=>$event->id,
                    'user_id'=>Auth::id()
                    ])->exists()
                 )
                    <a href="{{route('events.unobserve',$event)}}">Unobserve</a>
                    <br>

                @else

                    <form action="{{route('events.observe',$event)}}" method="POST">
                        @csrf
                        <button>Observe</button>
                    </form>

                @endif

                    @if( DB::table('tickets')->where([
                        'event_id'=>$event->id,
                        'user_id'=>Auth::id()
                        ])->exists()
                    )

                        <a href="{{route('events.ticket',$event)}}">Download ticket</a>

                    @else

                        <a href="{{route('events.buy',$event)}}">Buy ticket for only {{$event->price}}</a>

                    @endif

            @else

                <a href="{{route('events.edit',$event)}}">Edit</a>

                <form action="{{ route('events.destroy', $event) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>

            @endif
        </div>

        <div class="bg-white text-md lg:text-lg lg:col-span-4 xl:col-start-2 xl:col-span-3 shadow-md rounded-lg">
            <x-google.map :function="1" :lat="$event->latitude" :lon="$event->longitude "/>

            <div class="my-4 mx-4 ">
                {{$event->description}}
            </div>
        </div>

    </div>

</x-layouts.default>
