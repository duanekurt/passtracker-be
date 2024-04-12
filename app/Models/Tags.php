<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name',
        'tag_color',
        'status'
    ];

    public function scopeActive(Builder $query)
    {
        $query->where('status', 1);
    }
}
