<x-layouts.default>
    <p class="text-6xl mb-6 ml-0 md:ml-10">
        Event list:
    </p>
    </div>

    <div class="flex flex-col items-center mx-5">
        @if (count($events) == 0 && count($outdatedEvents) == 0)
            <p class="italic mb-5">There are no events (yet)! <a href="/events/create"><strong>Go create</strong></a> some cool event and come back</p>
            <img src="{{asset('images/no-events.png')}}" alt="No events" class="rounded-lg shadow w-auto md:w-1/2">
        @endif
        @foreach ($events as $event)
            <x-event-tab.event-list-element :event="$event" />
        @endforeach
        @foreach ($outdatedEvents as $event)
            <x-event-tab.event-list-element :event="$event" active="0"/>
        @endforeach
    </div>
</x-layouts.default>
