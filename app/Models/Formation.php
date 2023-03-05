<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'formation_participants', 'formation_id', 'participant_id');
    }
}
