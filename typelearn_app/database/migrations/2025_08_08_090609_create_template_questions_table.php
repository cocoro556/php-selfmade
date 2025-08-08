<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('template_questions', function (Blueprint $table) {
            $table->id();  // 問題ID
            $table->foreignId('category_id')->constrained()->onDelete('cascade');  // カテゴリID
            $table->text('question_text'); // 問題文
            $table->string('answer', 255); // 正解
            $table->text('hint')->nullable(); // ヒント（任意）
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy'); // 難易度
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_questions');
    }
};
