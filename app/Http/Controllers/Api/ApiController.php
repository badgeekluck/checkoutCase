<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    use HttpResponses;

    public function register(RegisterUserRequest $registerUserRequest)
    {
        $registerUserRequest->validated($registerUserRequest->only(['name', 'email', 'password']));

        $user = User::create([
            'name' => $registerUserRequest->name,
            'email' => $registerUserRequest->email,
            'password' => Hash::make($registerUserRequest->password)
        ]);

        return $this->success([
            'user' => $user,
        ]);
    }

    public function login(LoginUserRequest $loginUserRequest)
    {
        $loginUserRequest->validated($loginUserRequest->only('email', 'password'));

        // checking user login
        if (! Auth::attempt([
            'email' => $loginUserRequest->email,
            'password' => $loginUserRequest->password
        ])) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = Auth::user();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->name)->accessToken
        ]);
    }

    public function logout()
    {

    }

}
