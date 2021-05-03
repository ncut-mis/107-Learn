<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['question_id','from','to', 'message', 'is_read'];
}
