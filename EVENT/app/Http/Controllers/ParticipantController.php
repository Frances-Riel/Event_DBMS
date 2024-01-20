<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $parts = Participant::all();
        return view('participants.index', compact('parts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'address' => 'required',
          ]);
          Participant::create($request->all());
          return redirect()->route('participants.index')
            ->with('success','Participant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $part = Participant::find($id);

        return view('participants.show', compact('part'));
    }

    // routes functions
    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $part = Participant::find($id);

        return view('participants.edit', compact('part'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $part = Participant::find($id);
        $part->update($request->all());

        return redirect()->route('participants.index')
            ->with('success', 'Participant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $part = Participant::find($id);
        $part->delete();

        return redirect()->route('participants.index')
            ->with('success', 'Participant deleted successfully');
    }
}
