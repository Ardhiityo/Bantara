<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    public function memberCompetitions()
    {
        return $this->belongsToMany(Member::class, 'member_competition');
    }
}
