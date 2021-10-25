<?php

namespace App\Http\Controllers\Auth;

use App\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Domain\User\Actions\UpdateUserAction;
use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::Paginate(10));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(
        User $user,
        UpdateUserRequest $request,
        UpdateUserAction $action
    ) {
        $userData = UserData::fromRequest($request);
        $user = $action->execute($userData, $user);
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'user deleted successfully'], 200);
    }
}