<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PwTrackTags extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'tag_id',
        'pw_track_id'
    ];
}
