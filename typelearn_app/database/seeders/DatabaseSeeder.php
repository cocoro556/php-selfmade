<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Database\Seeders\QuestionsSeeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // 一旦データ削除（deleteに変えておくと外部キー制約でも安全）
            DB::table('answers')->delete();
            DB::table('questions')->delete();
            DB::table('categories')->delete();
            DB::table('users')->delete();

            // 各シーダーを順番に実行
            $this->call([
                CategorySeeder::class,    // カテゴリを先に作成
                HtmlQuestionSeeder::class,
                CssQuestionSeeder::class,
                PhpQuestionSeeder::class,
                JavaQuestionSeeder::class,
                PythonQuestionSeeder::class,
                JavascriptQuestionSeeder::class,
                SqlQuestionSeeder::class,
                LaravelQuestionSeeder::class,
                UserSeeder::class,        // ユーザーを作成
            ]);
        });
}
}