<?php

namespace App\Services\Interfaces;

interface PositionInterface
{
    public function gets();
    public function getPaginated();
    public function store($data);
}
