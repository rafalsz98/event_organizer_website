<x-layouts.default>
    @php
        $event=\App\Models\Event::all()->where('name','=','debug-gallery')->first();
            if(!\Illuminate\Support\Facades\DB::table('events')->where('name','=','debug-gallery')->exists())
            {
                $event = new \App\Models\Event();
                $event->datestart = new DateTime('15.01.2021 15:30');
                $event->duration = "2:30";
                $event->name = "debug-gallery";
                $event->description = "description";
                $event->place = "description";
                $event->latitude = 1.12345678;
                $event->longitude = 1.12345678;
                $event->max_participants=1;
                $event->current_participants=0;
                $event->price=2;
                $event->user_id=-1;

                $event->save();

                $image=new \App\Models\Image();
                $image->id=1;
                $image->event_id=$event->id;
                $image->image=base64_encode(file_get_contents(resource_path("views/debug/2.jpeg")));

                $image->save();

                $image=new \App\Models\Image();
                $image->event_id=$event->id;
                $image->image=base64_encode(file_get_contents(resource_path("views/debug/1.jpeg")));

                $image->save();

                $image=new \App\Models\Image();
                $image->event_id=$event->id;
                $image->image=base64_encode(file_get_contents(resource_path("views/debug/4.jpeg")));

                $image->save();
            }

    @endphp

    <x-gallery.gal :event="$event" class="w-444 my-5" />


</x-layouts.default>
