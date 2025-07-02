<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MemberCompetition extends Pivot
{
    protected $fillable = [
        'member_id',
        'competition_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
