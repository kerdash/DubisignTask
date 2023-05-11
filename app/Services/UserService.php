<?php

namespace App\Services;

use Carbon\Carbon;
use App\Utils\Upload;
use App\Repositories\UserRepository;
use App\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function getbyIdOrUsername($value)
    {
        return $this->userRepo->getbyIdOrUsername($value);
    }

    public function create()
    {
        $data = request();

        if($data->hasFile('certification')) $data->certification = (new Upload)->storage('certification', 'certification');
        if($data->has('birthdate')) $data->birthdate = Carbon::parse($data->birthdate)->format('Y-m-d');

        return $this->userRepo->create($data);
    }
}
