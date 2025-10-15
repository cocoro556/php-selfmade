<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionStoreTest extends TestCase
{
    use RefreshDatabase;


    public function test_store_question_success()
    {
        // ✅ ログインユーザーを作ってログイン状態にする
        $user = User::factory()->create();
        $this->actingAs($user);

        // カテゴリを作成（テスト用）
        $category = \App\Models\Category::create([
            'name' => 'PHP',
            'description' => 'PHPプログラミング'
        ]);

        $payload = [
            'question' => 'PHPのテストツールは？',  // question_text → question
            'answer' => 'PHPUnit',
            'category' => $category->id,            // 文字列 → カテゴリID
            'difficulty' => 'easy',                 // 難易度を追加
        ];

        $response = $this->post('/questions/store', $payload);

        // 成功したらリダイレクト（questions.listへ）
        $response->assertRedirect(route('questions.list'));

        // DBに保存されているか確認
        $this->assertDatabaseHas('questions', [
            'content' => 'PHPのテストツールは？',  // question_text → content
            'correct_answer' => 'PHPUnit',        // answer → correct_answer
        ]);
    }


    public function test_store_question_validation_error()
    {
        // ✅ ログイン状態を再現
        $user = User::factory()->create();
        $this->actingAs($user);

        // 空データで投稿（エラーを狙う）
        $payload = [];

        $response = $this->post('/questions/store', $payload);

        // エラーがセッションに入っていることを確認
        $response->assertSessionHasErrors(['question', 'answer', 'category', 'difficulty']);
    }
}
