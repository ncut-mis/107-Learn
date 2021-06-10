<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'title',
        'content',
        'user',
        'area',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'user' => 'string',
        'area' => 'string',
        'status' => 'integer',
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
