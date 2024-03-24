<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'account_type_name' => 'Personal',
            ],
            [
                'account_type_name' => 'Work',
            ],
            [
                'account_type_name' => 'Financial',
            ],
            [
                'account_type_name' => 'Utilities',
            ],
            [
                'account_type_name' => 'Entertainment',
            ],
            [
                'account_type_name' => 'Shopping',
            ],
            [
                'account_type_name' => 'Travel',
            ],
            [
                'account_type_name' => 'Gaming',
            ],
            [
                'account_type_name' => 'Education',
            ],
        ];

        AccountType::insert($payload);
    }
}
