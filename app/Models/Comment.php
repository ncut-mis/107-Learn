<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'question_id',
        'user_id',
    ];

    protected $casts = [
        'content' => 'string',
        'question_id' => 'integer',
        'user_id' => 'integer',
    ];
}
