<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'question_id',
        'content',
        'is_correct',
        'time_taken',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
