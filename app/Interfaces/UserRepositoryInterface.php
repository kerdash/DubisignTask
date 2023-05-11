<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAll();

    public function getbyIdOrUsername($value);

    public function create($data);
}
