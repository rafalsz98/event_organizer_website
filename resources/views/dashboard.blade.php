<x-layouts.default>
    <div class="flex mt-8 mx-3">
        <div class="flex-initial w-full md:w-3/12">
            <div class="grid grid-cols-6 items-center h-14">
                <p id="observedText" class="transition-all duration-500 col-span-4 lg:col-span-3 text-2xl">
                    <span class="cursor-pointer" onclick="changeTab(0)">Observed</span>
                </p>
                <p id="createdText" class="transition-all duration-500 col-span-2 lg:col-span-3 text-center text-sm text-black text-opacity-70">
                    <span class="cursor-pointer" onclick="changeTab(1)">My events</span>
                </p>
            </div>
            <div id="observedEvents" class="grid grid-cols-1 gap-4 py-4 transition-all duration-500 opacity-100">
                @if (count($boughtEvents) == 0 && count($observedEvents) == 0)
                    <p class="italic">No events! <a href="/"><strong>Go observe</strong></a> some cool events and come back</p>
                    <img src="{{asset('images/no-events.png')}}" alt="No events" class="rounded-lg shadow">
                @endif
                @foreach ($boughtEvents as $event)
                    <x-event-tab.event-tile :event="$event" ticketBought="1"/>
                @endforeach
                @foreach($observedEvents as $event)
                    <x-event-tab.event-tile :event="$event" ticketBought="0"/>
                @endforeach
            </div>
            <div id="createdEvents" class="grid grid-cols-1 gap-4 py-4 transition-all duration-500 hidden opacity-0">
                @forelse ($createdEvents as $event)
                    <x-event-tab.event-tile :event="$event" :ticketBought="0"/>
                @empty
                    <p class="italic">You haven't created any event! <a href="/events/create"><strong>Go create</strong></a> some cool event and come back</p>
                    <img src="{{asset('images/no-events.png')}}" alt="No events" class="rounded-lg shadow">
                @endforelse
            </div>
        </div>
        <div class="flex-initial hidden md:w-9/12 md:block sticky top-10 self-start">
            <x-event-tab.calendar :events="$allEvents"/>
        </div>
    </div>

    <a href="/events/create" class="fixed flex items-center justify-center w-12 h-12 rounded-full bg-blue-500 right-20 bottom-20 shadow">
        <span class="text-white text-4xl pb-1">+</span>
    </a>

    <script src="{{asset('js/dashboard/tabSwitch.js')}}"></script>
</x-layouts.default>
