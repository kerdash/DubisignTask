<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Media;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::paginate();
    }

    public function getbyIdOrUsername($value)
    {
        return User::where('id', $value)->orWhere('username', $value)->firstOrFail();
    }

    public function create($data)
    {
        $user = User::with('certification')->create([
            "username" => $data->username,
            "email" => $data->email,
            "bio" =>  $data->bio,
            "location" =>  $data->location,
            "birthdate" =>  $data->birthdate,
        ]);

        if($data->certification){
            $user->media()->create([
                "title" => $data->certification->title,
                "file" => $data->certification->file,
                "type" => $data->certification->type,
                "size" => $data->certification->size,
                "key" => 'certification',
            ]);
        }

        return $user;
    }
}
