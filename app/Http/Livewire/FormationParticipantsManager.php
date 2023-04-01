<?php

namespace App\Http\Livewire;

use App\Models\Formation;
use App\Models\Participant;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormationParticipantsManager extends Component
{
    public $formation;

    public $participants;

    public $participant_id;

    public $searchText;

    public function mount(Formation $formation)
    {
        $this->formation = $formation;

        $this->participants = Participant::all();
    }

    public function addParticipant()
    {
        $this->validate([
            'participant_id' => 'required|numeric|exists:participants,id'
        ]);

        $participantExist = $this->formation->participants()
                ->where('participants.id', $this->participant_id)
                ->exists();

        throw_if($participantExist, ValidationException::withMessages([
            'participant_id' => 'Le participant existe deja'
        ]));

        $this->formation->participants()->attach($this->participant_id);

         session()->flash('success', 'Participant ajoute avec success');
    }

    public function removeParticipant($participantId)
    {
        $this->formation->participants()->detach($participantId);

        session()->flash('success', 'Participant supprime avec success');
    }

    public function render()
    {
        $confirmatedParticipants = $this->formation->participants()
            ->when($this->searchText, fn($query) => $query->where('name', 'LIKE', "%$this->searchText%"))
            ->get();

        return view('livewire.formation-participants-manager', [
            'confirmatedParticipants' => $confirmatedParticipants
        ]);
    }
}
