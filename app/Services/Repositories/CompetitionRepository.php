<?php

namespace App\Services\Repositories;

use App\Models\Competition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\CompetitionInterface;

class CompetitionRepository implements CompetitionInterface
{
    public function gets()
    {
        return Competition::select('id', 'title', 'description', 'start_date', 'end_date')->get();
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            Competition::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store competition']);
        }
    }

    public function getTotal()
    {
        return Competition::where('end_date', '>=', now())->count();
    }
}
