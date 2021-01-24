@php
    $events = App\Models\Event::all();
@endphp

<x-layouts.default>
   <p class="font-bold text-2xl subpixel-antialiased">Events list:</p>

    @foreach ($events as $event)
        <x-event-tab.event-list-element :event="$event" />
    @endforeach

</x-layouts.default>
