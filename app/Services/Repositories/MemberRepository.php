<?php

namespace App\Services\Repositories;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\MemberInterface;

class MemberRepository implements MemberInterface
{
    public function gets()
    {
        return Member::with(['user:id,name,email', 'position:id,name'])->select('id', 'user_id', 'is_verified', 'phone', 'position_id')->get();
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            User::create($data)->member()->create($data);
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
}
