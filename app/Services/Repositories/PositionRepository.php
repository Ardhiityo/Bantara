<?php

namespace App\Services\Repositories;

use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\PositionInterface;

class PositionRepository implements PositionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function gets()
    {
        return Position::select('id', 'name')->get();
    }

    public function getPaginated()
    {
        return Position::select('id', 'name')->paginate(10);
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            Position::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store position']);
        }
    }
}
