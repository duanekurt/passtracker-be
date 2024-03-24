<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type_name'
    ];


    public function pw_tracks()
    {
        return $this->hasMany(PwTrack::class);
    }
}
