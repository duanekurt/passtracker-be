<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePwTrackRequest;
use App\Services\PwTrackService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PwTrackController extends Controller
{
    public function __construct(
        private readonly PwTrackService $pwTrackService
    ) {
        // parent constructor
    }

    public function index($filters = []): JsonResponse
    {
        $resp = $this->pwTrackService->getAll($filters);
        return $this->build_response_json($resp, 200, 'Fetched all');
    }

    public function create(CreatePwTrackRequest $request): JsonResponse
    {
        $resp = $this->pwTrackService->create($request);
        return $this->build_response_json($resp, 200, 'Created');
    }

    public function showPassword(Request $request): JsonResponse
    {
        $resp = $this->pwTrackService->showPassword($request);
        return $this->build_response_json($resp, 200, 'Password Decoded');
    }
}
