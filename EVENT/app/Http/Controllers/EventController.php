<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
          ]);
          Event::create($request->all());
          return redirect()->route('events.index')
            ->with('success','Participant created successfully.');
    }

    public function storeParticipant(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'address' => 'required',
            'Event_ID' => 'required',
        ]);

        Participant::create($request->all());

        return redirect()->back()->with('success', 'Participant created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::find($id);
        $parts = Participant::where('Event_ID', $events->id)->get();
        // dd($parts);

        return view('events.show', compact('parts','events'));
    }

    // routes functions
    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $events = Event::find($id);

        return view('events.edit', compact('events'));
    }
    public function editParticipant($id)
    {
        $parts = Participant::find($id);

        return view('events.editParticipant', compact('events'));
    }

    public function updateParticipant(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $parts = Participant::find($id);
        $parts->update($request->all());
        return redirect()->back()->with('success', 'Participant updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        $events = Event::find($id);
        $events->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Participant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $events = Event::find($id);
        $events->delete();

        return redirect()->route('events.index')
            ->with('success', 'Participant deleted successfully');
    }
    public function destroyParticipant(string $id)
    {
        $parts = Participant::find($id);
        $parts->delete();

        return redirect()->back()->with('success', 'Participant deleted successfully');
    }
}
