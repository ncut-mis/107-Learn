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
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class); // Note::class=App\Note
    }
}
