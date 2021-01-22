@php
    $events = App\Models\Event::all();
@endphp

<x-layouts.default>
    Events list:

    @foreach ($events as $event)
        <x-event-tab.event-list-element :event="$event" />
    @endforeach

</x-layouts.default>
