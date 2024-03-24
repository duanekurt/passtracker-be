<?php
namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait ScryptTrait
{
    public function encrypt($data): string
    {
        return Crypt::encryptString($data);
    }

    public function decrypt($encrypted_data): string
    {
        return Crypt::decryptString($encrypted_data);
    }
}
