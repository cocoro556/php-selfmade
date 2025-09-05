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
        Schema::create('answers', function (Blueprint $table) {
            $table->id(); // 回答ID、主キー、AUTO_INCREMENT
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 回答者ID、外部キー（users.id）
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // 問題ID、外部キー（questions.id）
            $table->text('content'); // 回答内容
            $table->boolean('is_correct')->default(false); // 正誤
            $table->integer('time_taken'); // 解答時間（秒）
            $table->timestamp('created_at')->useCurrent(); // 解答日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
