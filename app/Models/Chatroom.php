<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    use HasFactory;

    protected $table = 'chatrooms';

    protected $fillable = [
        'question_id',
        'solver_user_id',
        'asker_user_id',
        'status'
    ];

    protected $casts = [
        'question_id' => 'integer',
        'solver_user_id' => 'integer',
        'asker_user_id' => 'integer',
        'status' => 'integer'
    ];
}
