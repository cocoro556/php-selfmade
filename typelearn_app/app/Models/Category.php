<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    use HasFactory;
      // テンプレート問題とのリレーション
    public function templateQuestions()
    {
        return $this->hasMany(TemplateQuestion::class);
    }

    protected $fillable = ['name'];
}
