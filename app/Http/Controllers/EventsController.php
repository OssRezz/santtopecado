<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function eventsView()
    {
        $events = Event::orderBy('id', 'asc')->paginate(5);
        return view('events.event', compact('events'));
    }

    public function create(Request $request, Event $event)
    {
        $request->validate([
            'eventName' =>  'required',
            'eventPlace' =>  'required',
            'eventDate' =>  'required'
        ]);

        $status = 1;
        $event->eventName = $request->eventName;
        $event->eventPlace = $request->eventPlace;
        $event->eventDate = $request->eventDate;
        $event->fkStatus = $status;

        if ($event->save()) {
            return redirect()->back()->with('message', 'The event has been registered successfully');
        } else {
            return redirect()->back()->with('message', 'The event can"t no be registered');
        }
    }
}
