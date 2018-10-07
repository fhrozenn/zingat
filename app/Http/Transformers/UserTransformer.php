<?php

namespace App\Http\Transformers;


use App\Http\Dto\UserDto;
use App\User;

class UserTransformer
{

    public static function transform(User $user = null)
    {
        if ($user == null) {
            return null;
        }
        $userDto = new UserDto();
        $userDto->id = $user->id;
        $userDto->first_name = $user->first_name;
        $userDto->last_name = $user->last_name;

        return $userDto;
    }
}