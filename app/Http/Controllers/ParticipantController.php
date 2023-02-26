<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();

        return view('participants.index', [
            'participants' => $participants
        ]);
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string:255',
            'email' => 'required|string:225|email|unique:participants',
            'comment' => 'required'
        ]);

        Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Participant cree avec succes.');
    }

    public function edit(Participant $participant)
    {
        return view('participants.edit', [
            'participant' => $participant
        ]);
    }

    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name' => 'required|string:255',
            'email' => ['required', 'string:225', 'email', Rule::unique('participants')
            ->ignore($participant->id)],
            'comment' => 'required'
        ]);

        $participant->update([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Participant mis a jour avec succes.');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return back()->with('success', 'Participant supprime avec succes.');
    }
}
