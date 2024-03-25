<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{
    public function checkExist(string $email): array
    {
        $user = User::where('email', $email)->first();
        return ['email' => $email, 'exist' => !empty($user) ? true : false];
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        //validate password here
        if (!Hash::check($request->password, $user->password)) {
            throw new NotFoundHttpException('Invalid Credentials');
        }

        $token = [
            'access_token' => $user->createToken($user->email)->accessToken
        ];

        return ['token' => $token, 'user' => $user];
    }

    public function register(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //send email here

        $token = [
            'access_token' => $user->createToken($user->email)->accessToken
        ];

        return ['token' => $token, 'user' => $user];
    }

    public function setMasterPassword(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();

        $user->master_password = bcrypt($request->master_password);
        $user->save();

        return ['user' => $user];
    }
}
