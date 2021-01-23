<x-layouts.default>
    <div class="bg-white shadow py-6 px-4 mx-8 rounded-lg">
        <p class="font-bold text-2xl subpixel-antialiased">Edit an event</p>
    </div>
    <x-auth-validation-errors class="mb-4 mx-auto sm:px-6 lg:px-8 pt-4" :errors="$errors" />
    <form method="post" enctype="multipart/form-data" action="{{ route('events.update', $event) }}">
        @csrf
        @method("PUT")
        <div class="grid md:grid-cols-2">
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$event->name" autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="datestart_date" :value="__('Date')" />
                                <x-input id="datestart_date" class="block mt-1 w-full" type="date" name="datestart_date" :value="$event->datestart->format('Y-m-d')" autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="datestart_time" :value="__('Time')" />
                                <x-input id="datestart_time" class="block mt-1 w-full" placeholder="hrs:mins" type="time" name="datestart_time" :value="$event->datestart->format('H:i')" autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="duration" :value="__('Duration')" />
                                <x-input id="duration" class="block mt-1 w-full" type="time" name="duration" :value="$event->duration->format('H:i')" />
                            </div>

                            <div class="mt-4">
                                <x-label for="max_participants" :value="__('Number of tickets')" />
                                <x-input id="max_participants" class="block mt-1 w-full" type="number" min="0" name="max_participants" :value="$event->max_participants" />
                            </div>

                            <div class="mt-4">
                                <x-label for="price" :value="__('Price for a ticket')" />
                                <x-input id="price" class="block mt-1 w-full" type="number" min="0.00" step="0.01" name="price" :value="$event->price" />
                            </div>

                            <div class="mt-4">
                                <x-label for="description" :value="__('Description')" />
                                <textarea class="block mt-1 w-full resize-none border rounded-md" rows="10" name="description">{{$event->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <x-label for="place" :value="__('Placename')" />
                                <x-input id="place" class="block mt-1 w-full" type="text" name="place" :value="$event->place" autofocus />
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <p class="font-bold pb-2 mx-auto sm:px-6 lg:px-8">Now point it on the map:</p>
                <input type="hidden" name="latitude" id="latitude" />
                <input type="hidden" name="longitude" id="longitude" />
                <div class="mx-auto sm:px-6 lg:px-8">
                    <x-google.map :function="3" :lat="$event->latitude" :lon="$event->longitude"/>
                </div>
                <br><br><br>
                <div class="flex items-center justify-end mt-4  mx-auto sm:px-6 lg:px-8">
                    <x-button class="ml-4">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.default>
