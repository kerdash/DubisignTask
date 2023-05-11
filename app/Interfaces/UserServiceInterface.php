<?php

namespace App\Interfaces;

interface UserServiceInterface
{
    public function getAll();

    public function getbyIdOrUsername($value);

    public function create();
}
