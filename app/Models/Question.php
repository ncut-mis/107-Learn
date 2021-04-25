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
    ];

    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'user' => 'string',
        'area' => 'string',
        'status' => 'string',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
