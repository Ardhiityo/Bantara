<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberCompetitionRequest;
use App\Http\Requests\UpdateMemberCompetitionRequest;
use App\Models\MemberCompetition;
use App\Services\Interfaces\CompetitionInterface;
use App\Services\Interfaces\MemberCompetitionInterface;
use App\Services\Interfaces\MemberInterface;

class MemberCompetitionController extends Controller
{
    public function __construct(
        private MemberCompetitionInterface $memberCompetitionRepository,
        private MemberInterface $memberRepository,
        private CompetitionInterface $competitionRepository,
    ) {}

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
        $this->authorize('create', MemberCompetition::class);

        $users = $this->memberRepository->gets();
        $competitions = $this->competitionRepository->gets();

        return  view('pages.member-competition.create', compact('users', 'competitions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberCompetitionRequest $request)
    {
        $this->memberCompetitionRepository->store($request->validated());

        return redirect()->route('member-competitions.index')->with('success', 'Member Competition created successfully.');
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
        $this->authorize('update', MemberCompetition::class);

        $users = $this->memberRepository->gets();
        $competitions = $this->competitionRepository->gets();

        return view('pages.member-competition.edit', compact('memberCompetition', 'users', 'competitions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberCompetitionRequest $request, MemberCompetition $memberCompetition)
    {
        $memberCompetition->update($request->validated());

        return redirect()->route('member-competitions.index')->with('success', 'Member Competition updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberCompetition $memberCompetition)
    {
        $this->authorize('delete', MemberCompetition::class);

        $memberCompetition->delete();

        return redirect()->route('member-competitions.index')->with('success', 'Member Competition deleted successfully.');
    }
}
