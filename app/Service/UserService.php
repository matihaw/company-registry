<?php

namespace App\Service;

use App\DataTransferObjects\UserDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register(UserDto $data): User
    {
        return User::create($data->toArray());
    }

    public function login(UserDto $data): ?User
    {
        $user = User::where("email", $data->getEmail())->first();

        if (!$user || !Hash::check($data->getPassword(), $user->password)) {
            return null;
        }

        return $user;
    }
}
