<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $events=Event::all();

        return view('events')->withEvents($events);
    }

    public function show(Event $event)
    {
        return view('events.show')->withEvent($event);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $this->ValidateEvent($request);

        $event = new Event();

        $event->datestart = $request->datestart_date.' '.$request->datestart_time;
        $event->duration = $request->duration;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        $event->max_participants = $request->max_participants;
        $event->current_participants = 0;
        $event->price = $request->price;
        $event->user_id=$request->user()->id;

        $event->save();

        $files = $request->file('images');
        foreach ($files as $file)
        {
            $image = new Image();
            $image->image = base64_encode(file_get_contents($file));
            $image->event_id = $event->id;
            $image->save();
        }

        return redirect()->route('events.show', $event);

    }

    public function edit(Event $event)
    {
        return view('events.edit')->withEvent($event);
    }

    public function update(Request $request, Event $event)
    {
        $this->ValidateEvent($request);

        $event->datestart = $request->datestart_date.' '.$request->datestart_time;
        $event->duration = $request->duration;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        $event->max_participants = $request->max_participants;
        $event->price = $request->price;

        $event->update();

        return redirect()->route('events.show',$event);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }

    public function observe(Request $request,Event $event)
    {
        $color=0;
        if ($request->has('color')) {
            $color=$request->color;
        }

        $user_id=Auth::id();

        if(!DB::table('observers')->where(['event_id'=>$event->id,'user_id'=>$user_id])->exists()
            && $event->user_id != $user_id)
        {
            DB::table('observers')->insert(['event_id'=>$event->id,'user_id'=>$user_id,'color'=>$color]);
        }

        return redirect()->back();
    }

    public function unobserve(Event $event)
    {
        $user_id=Auth::id();

        if(DB::table('observers')->where(['event_id'=>$event->id,'user_id'=>$user_id])->exists())
            DB::table('observers')->where(['event_id'=>$event->id,'user_id'=>$user_id])->delete();

        return redirect()->back();
    }

    public function dashboard()
    {
        //find observed,bought,created by user events and return them
        $user_id=Auth::id();

        //observed events
        $observed_events_ids_objects=DB::table('observers')->select('event_id')->where(['user_id'=>$user_id])->get();
        $observed_events=[];
        foreach ($observed_events_ids_objects as $observed_events_ids_object)
            $observed_events[]=$observed_events_ids_object->event_id;
        $observed_events=Event::all()->find($observed_events);

        //bought events
        $bought_events_ids_objects=DB::table('tickets')->select('event_id')->where(['user_id'=>$user_id])->get();
        $bought_events=[];
        foreach ($bought_events_ids_objects as $bought_events_ids_object)
            $bought_events[]=$bought_events_ids_object->event_id;
        $bought_events=Event::all()->find($bought_events);

        //created events
        $created_events=Auth::user()->events()->get();


        // hotfix until change of db
        $allEvents = Event::all();
        $observed_events = $observed_events->diff($bought_events)->all();



        return view('dashboard')
            ->withAllEvents($allEvents)
            ->withObservedEvents($observed_events)
            ->withCreatedEvents($created_events)
            ->withBoughtEvents($bought_events);
    }

    public function buy(Event $event)
    {
        $user_id=Auth::id();
        $bought = false;

        $availableTickets = $event->max_participants - $event->current_participants;

        if(!DB::table('tickets')->where(['event_id'=>$event->id,'user_id'=>$user_id])->exists()
            && $availableTickets > 0)
        {
            DB::table('tickets')->insert(['event_id'=>$event->id,'user_id'=>$user_id]);
            $event->current_participants += 1;
            $bought = true;
        }

        return redirect()->back()->withBought($bought);
    }

    public function ticket(Event $event)
    {
        $user_id=Auth::id();
        $email=Auth::user()->email;

        if(DB::table('tickets')->where(['event_id'=>$event->id,'user_id'=>$user_id])->exists())
        {
            $pdf= PDF::loadView('ticket/ticketPDF', array(
                'name' => $event->name,
                'datestart' => $event->datestart,
                'duration' => $event->duration,
                'place' => $event->place,
                'price' => $event->price,
                'email' => $email
            ));
            return $pdf->setPaper('a5', 'landscape')->download('ticket.pdf');
        }

        $ticket=false;
        return redirect()->back()->withTicket($ticket);
    }

    private function ValidateEvent(Request $request)
    {
        $todayDate = date('Y-m-d H:i',time() + 60*60);

        return $request->validate([
            'datestart_date' => 'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
            'datestart_time' =>  'required|date_format:H:i',
            'duration' => 'required|regex:/^[0-9][0-9]:[0-5][0-9]$/',
            'name' => 'required|max:64',
            'description' => 'required',
            'place' => 'required|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'max_participants' => 'required|numeric|min:1|max:79000000000',
            'price' => 'required|min:0|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);
    }
}
