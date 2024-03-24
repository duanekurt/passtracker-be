<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PwTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'password_for',
        'slug',
        'email_username',
        'unhashed_password',
        'hashed_password',
        'account_type_id',
        'user_id',
        'status'
    ];


    public function user_pwtracks()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function account_type()
    {
        return $this->hasOne(AccountType::class, 'id', 'account_type_id');
    }
}
