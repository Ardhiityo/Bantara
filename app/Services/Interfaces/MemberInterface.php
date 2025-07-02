<?php

namespace App\Services\Interfaces;

interface MemberInterface
{
    public function getPaginated();
    public function store($data);
}
