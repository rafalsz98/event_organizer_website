<x-layouts.default>
    @php
        $event = new \App\Models\Event();
        $event->id = 1;
        $event->datestart = new DateTime('15.01.2021 15:30');
        $event->duration = "2:30";
        $event->name = "SAMURAI";
        $event->description = "description";
    @endphp
    <x-event-short-tab.big :event="$event" class="w-40 my-5" />
</x-layouts.default>