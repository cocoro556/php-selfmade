<?php

namespace Database\Seeders;

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
        // \DB::table('questions')->truncate();
        // \DB::table('categories')->truncate();
        // \DB::table('users')->truncate();
        
        $this->call([
            CategorySeeder::class,    // カテゴリを先に作成
            QuestionSeeder::class,    // 問題を作成
            UserSeeder::class,        // ユーザーを作成
        ]);
    }
}
