<?php

namespace App\Services\Interfaces;

interface MemberCompetitionInterface
{
    public function gets();
    public function store(array $data);
    public function getTotal();
    public function getLatest();
    public function check($competition);
}
