<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Services\Interfaces\MemberInterface;
use App\Services\Interfaces\PositionInterface;

class MemberController extends Controller
{
    public function __construct(
        private MemberInterface $memberRepository,
        private PositionInterface $positionRepository,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->memberRepository->gets();

        return view('pages.member.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = $this->positionRepository->gets();

        return view('pages.member.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $this->memberRepository->store($request->validated());

        return redirect()->route('members.index')->with('success', 'Member created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        $positions = $this->positionRepository->gets();

        $member->load(['position:id,name', 'user:id,name,email']);

        return view('pages.member.edit', compact('member', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $this->memberRepository->update($request->validated(), $member);

        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->user()->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
