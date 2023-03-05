<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormationParticipantController extends Controller
{
    public function store(Request $request, Formation $formation)
    {
        $request->validate([
            'participant_id' => 'required|numeric|exists:participants,id'
        ]);

        $participantExist = $formation->participants()
                ->where('participants.id', $request->participant_id)
                ->exists();

        throw_if($participantExist, ValidationException::withMessages([
            'participant_id' => 'Le participant existe deja'
        ]));

        $formation->participants()->attach($request->participant_id);

        return back()->with('success', 'Participant ajoute avec success');
    }

    public function destroy(Formation $formation, Participant $participant)
    {
        $formation->participants()->detach($participant->id);

        return back()->with('success', 'Participant supprime avec success');
    }
}
