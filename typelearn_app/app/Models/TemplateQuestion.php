<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class TemplateQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'question_text',
        'answer',
        'hint',
        'difficulty',
    ];

    // カテゴリとのリレーション
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
