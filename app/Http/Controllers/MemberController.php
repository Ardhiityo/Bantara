<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use App\Services\Interfaces\MemberInterface;
use App\Services\Interfaces\PositionInterface;
use Illuminate\Http\Request;

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
        $members = $this->memberRepository->getPaginated();

        return view('pages.member.index', compact('members'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
