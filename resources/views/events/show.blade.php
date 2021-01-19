<x-layouts.default>

    <div class="grid grid-cols-5 gap-20">
        <div class="text-6xl col-start-2">
            {{$event->name}}
        </div>
    </div>

    <div class="grid grid-cols-5 gap-20">

        <div class="text-6xl col-start-2 col-span-3 ">
            <x-gallery :event="$event"/>
        </div>

        <div class="bg-white px-4 py-4 text-gray-400 stroke-current fill-current">
            <div class="flex ">
                <x-icons.calendar class="flex block h-5 pr-2"/>{{$event->datestart  }}
            </div>
            <div class="flex">
                <x-icons.pin class="flex block h-5 pr-2"/>{{$event->place  }}
            </div>

{{--            sprawdza wlasciciela : tak : pokaz edytuj/usun,jesli nie pokaz obserwuj/nieobserwuj--}}
            @if(\Illuminate\Support\Facades\Auth::id() !== $event->user_id)

                <form action="{{route('events.observe',$event)}}" method="POST">
                    @csrf
                    <button>Observe</button></a>
                </form>

                <a href="{{route('events.unobserve',$event)}}">Unobserve Event</a>
                <br>

                <a href="{{route('events.buy',$event)}}">Buy ticket</a>
                <br>
            @else

                <a href="{{route('events.edit',$event)}}">Edit Event</a>

                <form action="{{ route('events.destroy', $event) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>

            @endif
        </div>

        <div class="bg-white col-start-2 col-span-4 text-lg ">
            <x-google.map />

            <div class="my-4 mx-4 ">
                {{$event->description}}
            </div>
        </div>

    </div>

</x-layouts.default>
