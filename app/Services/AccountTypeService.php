<?php

namespace App\Services;

use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeService
{
    public function __construct()
    {
    }

    public function getAll(array $filters)
    {
        $data = AccountType::orderBy('created_at', 'DESC')->get();

        return $data;
    }

    public function create(Request $request)
    {
        $data = AccountType::updateOrCreate([
            'account_type_name' => $request->account_type_name
        ], ['account_type_name' => $request->account_type_name]);

        return $data;
    }
}
