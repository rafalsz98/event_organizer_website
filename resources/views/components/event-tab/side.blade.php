@props(['event'])

<section class="flex flex-row flex-wrap mx-auto font-mono">
    <div class="transition-all duration-150 flex px-4 py-3 w-full md:w-md-1/3 lg:w-1/4">
        <div class="bg-gray-50 w-full items-stretch min-h-full pb-2 mb-1 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
            <div class="items-center flex-1 px-4  text-center mx-auto">
                <p class="self-end text-l font-bold tracking-normal text-gray-800">{{$event->name}}</p>
                <div class="grid grid-cols-2 gap-1 py-1">
                    <p></p>
                    <div class="flex flex-row-reverse"><img src="/images/ticket.png" width="30" height="30">
                        <p class="px-2">{{$event->current_participants}}/{{$event->max_participants}}</p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-300" />

            <p class="flex flex-row flex-wrap w-full px-4 py-1 overflow-hidden text-sm text-justify text-gray-700">
                {{$event->datestart}}
            </p>
            <p class="flex flex-row flex-wrap w-full px-4 py-1 overflow-hidden text-sm text-justify text-gray-700">
                Event duration: {{$event->duration}}
            </p>
            <p class="flex flex-row flex-wrap w-full px-4 py-1 overflow-hidden text-sm text-justify text-gray-700">
                {{$event->place}}
            </p>

            <hr class="border-gray-300" />

            <section class="px-2 py-1 mt-1">
                <div class="flex flex-row-reverse">
                    <a href="/event/{{$event->id}}" class="pl-2 text-gray-700 hover:underline">
                        Details
                    </a>
                    <img src="/images/details.png" width="18" height="10">
                </div>
            </section>

        </div>
    </div>
</section>
