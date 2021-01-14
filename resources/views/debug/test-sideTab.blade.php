<x-layouts.default>
    @php
        $event = new \App\Models\Event();
        $event->id = 1;
        $event->datestart = new DateTime('15.01.2021 15:30');
        $event->duration = 2;
        $event->name = "Power Rangers";
        $event->current_participants=27;
        $event->max_participants=199;
        $event->place='Stadion Narodowy, Warszawa';
    @endphp
    <x-event-tab.side :event="$event"/>
</x-layouts.default>
