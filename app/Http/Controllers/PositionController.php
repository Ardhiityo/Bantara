<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Position;
use App\Services\Interfaces\PositionInterface;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct(private PositionInterface $positionRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = $this->positionRepository->getPaginated();

        return view('pages.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        $this->positionRepository->store($request->validated());

        return redirect()->route('positions.index')->with('success', 'Position created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}
