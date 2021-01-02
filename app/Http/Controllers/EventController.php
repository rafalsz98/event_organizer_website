<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->datestart = $request->input('datestart');
        $event->duration = $request->input('duration');
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->place = $request->input('place');
        $event->latitude = $request->input('latitude');
        $event->longitude = $request->input('longitude');
        $event->max_participants = $request->input('max_participants');
        $event->current_participants = $request->input('current_participants');
        $event->price = $request->input('price');

        $event->save();

        $user = User::find($request->input('user_id'));
        $event->users()->attach($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
