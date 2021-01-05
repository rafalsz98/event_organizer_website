<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class EventController extends Controller
{
    public function index()
    {
        $events=Event::all();

        return view('events.index')->withEvents($events);
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

        $event->datestart = $request->datestart.':00';
        $event->duration = $request->duration;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        $event->max_participants = $request->max_participants;
        $event->current_participants = 0;
        $event->price = $request->price;
        $event->creator_id=$request->user()->id;

        $event->save();

        return redirect()->route('events.show', $event);

    }

    public function edit(Event $event)
    {
        if(Auth::id() != $event->creator_id)
            return redirect()->route('events.index');

        return view('events.edit')->withEvent($event);
    }

    public function update(Request $request, Event $event)
    {
        $this->ValidateEvent($request);

        $event->datestart = $request->datestart.':00';
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
        if(Auth::id() != $event->creator_id)
            return redirect()->route('events.index');

        $event->delete();

        return redirect()->route('events.index');
    }

    private function ValidateEvent(Request $request)
    {
        $todayDate = date('Y-m-d H:i');

        return $request->validate([
            'datestart' => 'required|date_format:Y-m-d H:i|after_or_equal:'.$todayDate,
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
