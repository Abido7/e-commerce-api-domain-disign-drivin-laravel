<?php

namespace App\Http\Controllers\Auth;

use App\Controllers\Controller;
use App\Http\Resources\UserResource;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{

    //this method adds new users
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return  response()->json($validator->errors(), 404);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['token' => $user->createToken('tokens')->plainTextToken]);
    }


    //use this method to signin users
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return  response()->json($validator->errors(), 404);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['token' => auth()->user()->createToken('Tokens')->plainTextToken]);
        }
        return response()->json(['error' => 'Unauthorised'], 401);
    }


    //use this method to show user profile
    public function profile()
    {
        return  new UserResource(Auth::user());
    }


    // this method logout users by removing tokens
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'loged Out Successfully'], 200);
    }
}