<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UsersController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    public function checkExist(string $email): JsonResponse
    {
        $validate = Validator::make(
            ['email' => $email],
            ['email' => 'email']
        );

        if ($validate->fails()) {
            throw new UnprocessableEntityHttpException($validate->messages()->first());
        }

        $resp = $this->userService->checkExist($email);
        return $this->build_response_json($resp, 200);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $resp = $this->userService->login($request);
        return $this->build_response_json($resp, 200, 'Login Success');
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $resp = $this->userService->register($request);
        return $this->build_response_json($resp, 200, 'Register Success');
    }
}
