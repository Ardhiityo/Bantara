<?php

namespace App\Services\Repositories;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\MemberInterface;

class MemberRepository implements MemberInterface
{
    public function gets()
    {
        return User::role('user')
            ->with(['member:id,user_id,is_verified,phone,position_id', 'member.position:id,name'])->select('id', 'name', 'email')
            ->get();
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $user = User::create($data);
            $user->assignRole('user');
            $user->member()->create([
                'phone' => $data['phone'],
                'position_id' => $data['position_id'],
                'is_verified' => false,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store member']);
        }
    }

    public function update($data, Member $member)
    {
        try {
            DB::beginTransaction();
            is_null($data['password']) ? $data['password'] =
                $member->user->password : $data['password'] = Hash::make($data['password']);
            $member->user()->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
            $member->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['update member']);
        }
    }

    public function getTotal()
    {
        return Member::where('is_verified', true)->count();
    }

    public function getStatistics()
    {
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        $data = [];

        foreach ($months as $month) {
            $data[] = Member::whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year)
                ->count();
        }

        return $data;
    }

    public function join($competition)
    {
        try {
            DB::beginTransaction();
            Auth::user()->member->memberCompetitions()->attach($competition->id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['join member']);
        }
    }
}
