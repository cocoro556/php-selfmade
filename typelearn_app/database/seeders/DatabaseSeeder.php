<?php

namespace Database\Seeders;

use Database\Seeders\TemplateQuestionsSeeder;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 既存データを削除（外部キー制約を考慮）
        \DB::table('template_questions')->delete();
        \DB::table('categories')->delete();

        $this->call(CategorySeeder::class);
        $this->call(TemplateQuestionsSeeder::class);
    }
}
