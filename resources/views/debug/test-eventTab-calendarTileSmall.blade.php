<x-layouts.default>
    @php
        $event = new \App\Models\Event();
        $event->id = 1;
        $event->datestart = new DateTime('15.01.2021 15:30');
        $event->duration = 2;
        $event->name = "SAMURAI";
        $event->description = "description";
    @endphp
    <x-event-tab.calendar-tile-small :event="$event" class="w-40 my-5" />
</x-layouts.default>
