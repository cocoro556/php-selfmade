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
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // 問題ID、主キー、AUTO_INCREMENT
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // 作成者ID、外部キー（users.id）、テンプレ時は NULL
            $table->text('question_text'); // 問題文
            $table->string('correct_answer', 255); // 正解
            $table->text('hint')->nullable(); // ヒント、任意（テンプレ問題で特に利用）
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // カテゴリID、外部キー（categories.id）
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy'); // 難易度、easy / medium / hard
            $table->boolean('is_template')->default(false); // テンプレ区分、true=テンプレ問題 / false=自作問題
            $table->timestamps(); // created_at, updated_at（Laravel標準、自動生成・更新対応）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
