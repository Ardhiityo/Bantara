<?php

namespace App\Http\Controllers;

use App\Models\MemberCompetition;
use App\Services\Interfaces\MemberCompetitionInterface;
use Illuminate\Http\Request;

class MemberCompetitionController extends Controller
{
    public function __construct(private MemberCompetitionInterface $memberCompetitionRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberCompetitions = $this->memberCompetitionRepository->gets();

        return view('pages.member-competition.index', compact('memberCompetitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('pages.member-competition.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberCompetition $memberCompetition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberCompetition $memberCompetition)
    {
        return view('pages.member-competition.edit', compact('memberCompetition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberCompetition $memberCompetition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberCompetition $memberCompetition)
    {
        $memberCompetition->delete();

        return redirect()->route('member-competition.index')->with('success', 'Member Competition deleted successfully.');
    }
}
