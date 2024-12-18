<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function participantScores()
    {
        return $this->hasMany(ParticipantScore::class);
    }
}
