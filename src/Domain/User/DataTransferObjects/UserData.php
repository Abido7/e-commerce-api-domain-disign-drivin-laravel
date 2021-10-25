<?php

namespace Domain\User\DataTransferObjects;

use App\Http\Requests\UpdateUserRequest;
use Domain\Role\Models\Role;
use Domain\User\Models\User;

class UserData
{

    public function __construct(
        public ?string $name,
        public ?string $address,
        public ?string $phone,
        public ?bool $is_active,
        public ?Role $role,
    ) {
    }

    public static function fromRequest(
        UpdateUserRequest $request,

    ): self {
        // dd($request->role);
        return new self(
            name: $request->name,
            address: $request->address,
            phone: $request->phone,
            is_active: $request->is_active,
            role: $request->role_id ? Role::findOrFail($request->role_id) : null,
        );
    }
}