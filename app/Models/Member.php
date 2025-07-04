<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'is_verified',
        'phone',
        'position_id'
    ];

    protected $casts = [
        'is_verified' => 'bool',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function memberCompetitions()
    {
        return $this->belongsToMany(Competition::class, 'member_competition');
    }
}
