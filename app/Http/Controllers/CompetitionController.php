<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Services\Interfaces\CompetitionInterface;

class CompetitionController extends Controller
{
    public function __construct(
        private CompetitionInterface $competitionRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = $this->competitionRepository->gets();

        return view('pages.competition.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.competition.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetitionRequest $request)
    {
        $this->competitionRepository->store($request->validated());

        return redirect()->route('competitions.index')->with('success', 'Competition created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        return view('pages.competition.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetitionRequest $request, Competition $competition)
    {
        $competition->update($request->validated());

        return redirect()->route('competitions.index')->with('success', 'Competition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('competitions.index')->with('success', 'Competition deleted successfully');
    }
}
