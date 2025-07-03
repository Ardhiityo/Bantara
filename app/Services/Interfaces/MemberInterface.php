<?php

namespace App\Services\Interfaces;

use App\Models\Member;

interface MemberInterface
{
    public function gets();
    public function store($data);
    public function update($data, Member $member);
    public function getTotal();
}
