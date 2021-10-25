<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;

class UpdateUserAction
{

    public function execute(
        UserData $userData,
        User $user
    ): User {
        $user->name = $userData->name ?? $user->name;
        $user->address = $userData->address ?? $user->address;
        $user->phone = $userData->phone ?? $user->phone;
        $user->is_active = $userData->is_active ?? $user->is_active;
        $userData->role ? $user->role()->associate($userData->role) : '';
        $user->save();
        return $user->refresh();
    }
}