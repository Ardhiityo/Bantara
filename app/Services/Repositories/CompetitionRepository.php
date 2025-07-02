<?php

namespace App\Services\Repositories;

use App\Models\Competition;
use App\Services\Interfaces\CompetitionInterface;

class CompetitionRepository implements CompetitionInterface
{
    public function gets()
    {
        return Competition::select('id', 'title', 'description', 'start_date', 'end_date')->get();
    }
}
