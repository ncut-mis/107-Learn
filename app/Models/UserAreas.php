<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAreas extends Model
{
    use HasFactory;
    protected $table = 'user_areas';

    protected $fillable = [
        'user_id',
        'area_id'
    ];

    protected $casts = [
        'user_id' => 'string',
        'area_id' => 'string'
    ];

}
