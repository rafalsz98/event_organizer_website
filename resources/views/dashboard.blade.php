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
                @foreach ($boughtEvents as $event)
                    <x-event-tab.event-tile :event="$event" ticketBought="1"/>
                @endforeach
                @foreach($observedEvents as $event)
                    <x-event-tab.event-tile :event="$event" ticketBought="0"/>
                @endforeach
            </div>
            <div id="createdEvents" class="grid grid-cols-1 gap-4 py-4 transition-all duration-500 hidden opacity-0">
                @foreach ($createdEvents as $event)
                    <x-event-tab.event-tile :event="$event" :ticketBought="0"/>
                @endforeach
            </div>
        </div>
        <div class="flex-initial hidden md:w-9/12 md:block">
            <x-event-tab.calendar :events="$allEvents"/>
        </div>
    </div>
    <script src="{{asset('js/dashboard/tabSwitch.js')}}"></script>
</x-layouts.default>
