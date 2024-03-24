<?php

namespace App\Http\Controllers;

use App\Services\AccountTypeService;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    public function __construct(
        private readonly AccountTypeService $accountTypeService
    ) {
    }

    public function all($filters = [])
    {
        $data = $this->accountTypeService->getAll($filters);
        return $this->build_response_json($data, 200, 'Fetched all');
    }

    public function create(Request $request)
    {
        $resp = $this->accountTypeService->create($request);

        return $this->build_response_json($resp, 200);
    }
}
