<x-layouts.default>
    @php
        $events = \App\Models\Event::all()
    @endphp

    <x-event-tab.calendar :events="$events"></x-event-tab.calendar>

</x-layouts.default>
