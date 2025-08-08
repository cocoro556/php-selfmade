<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemplateQuestion;
use App\Models\Category;

class TemplateQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // 初級（easy）の問題
        TemplateQuestion::create([
            'category_id'   => $categories['HTML'],
            'question_text' => '<h1>タグは何を意味しますか？',
            'answer'        => '見出し1',
            'hint'          => '文章のタイトルに使います',
            'difficulty'    => 'easy',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['CSS'],
            'question_text' => 'CSSで文字色を指定するプロパティは？',
            'answer'        => 'color',
            'hint'          => '背景色じゃない方です',
            'difficulty'    => 'easy',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['JavaScript'],
            'question_text' => 'JavaScriptで配列を作成する方法は？',
            'answer'        => 'var arr = [];',
            'hint'          => 'var 変数名 = [];',
            'difficulty'    => 'easy',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['PHP'],
            'question_text' => 'PHPで配列を作成する方法は？',
            'answer'        => '$arr = [];',
            'hint'          => '$変数名 = [];',
            'difficulty'    => 'easy',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['SQL'],
            'question_text' => 'SQLでデータを取得する方法は？',
            'answer'        => 'SELECT * FROM テーブル名;',
            'hint'          => 'SELECT 列名 FROM テーブル名;',
            'difficulty'    => 'easy',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['Python'],
            'question_text' => 'Pythonで配列を作成する方法は？',
            'answer'        => 'arr = []',
            'hint'          => '変数名 = []',
            'difficulty'    => 'easy',
        ]);

        // 中級（medium）の問題
        TemplateQuestion::create([
            'category_id'   => $categories['HTML'],
            'question_text' => 'HTMLでフォームを作成するタグは？',
            'answer'        => '<form>',
            'hint'          => 'フォームの開始タグです',
            'difficulty'    => 'medium',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['CSS'],
            'question_text' => 'CSSで要素を中央寄せにする方法は？',
            'answer'        => 'margin: 0 auto;',
            'hint'          => 'marginプロパティを使います',
            'difficulty'    => 'medium',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['JavaScript'],
            'question_text' => 'JavaScriptでイベントリスナーを追加する方法は？',
            'answer'        => 'addEventListener',
            'hint'          => 'addEventListener(イベント名, 関数)',
            'difficulty'    => 'medium',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['PHP'],
            'question_text' => 'PHPでセッションを開始する関数は？',
            'answer'        => 'session_start()',
            'hint'          => 'session_start()',
            'difficulty'    => 'medium',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['SQL'],
            'question_text' => 'SQLでテーブルを結合する方法は？',
            'answer'        => 'JOIN',
            'hint'          => 'JOIN テーブル名 ON 条件',
            'difficulty'    => 'medium',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['Python'],
            'question_text' => 'Pythonでクラスを定義する方法は？',
            'answer'        => 'class クラス名:',
            'hint'          => 'class クラス名:',
            'difficulty'    => 'medium',
        ]);

        // 上級（hard）の問題
        TemplateQuestion::create([
            'category_id'   => $categories['HTML'],
            'question_text' => 'HTMLでセマンティックなマークアップをする際の主要なタグは？',
            'answer'        => '<header><nav><main><section><article><footer>',
            'hint'          => 'header, nav, main, section, article, footer',
            'difficulty'    => 'hard',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['CSS'],
            'question_text' => 'CSSでレスポンシブデザインを実現するメディアクエリは？',
            'answer'        => '@media (max-width: 768px)',
            'hint'          => '@media (max-width: 画面幅)',
            'difficulty'    => 'hard',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['JavaScript'],
            'question_text' => 'JavaScriptでPromiseを使った非同期処理の書き方は？',
            'answer'        => 'new Promise((resolve, reject) => {})',
            'hint'          => 'new Promise((resolve, reject) => {})',
            'difficulty'    => 'hard',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['PHP'],
            'question_text' => 'PHPでPDOを使ったデータベース接続の書き方は？',
            'answer'        => 'new PDO("mysql:host=localhost;dbname=test", "user", "pass")',
            'hint'          => 'new PDO("mysql:host=ホスト;dbname=DB名", "ユーザー", "パス")',
            'difficulty'    => 'hard',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['SQL'],
            'question_text' => 'SQLでサブクエリを使った複雑なクエリの例は？',
            'answer'        => 'SELECT * FROM users WHERE id IN (SELECT user_id FROM orders)',
            'hint'          => 'SELECT * FROM テーブル WHERE 列 IN (サブクエリ)',
            'difficulty'    => 'hard',
        ]);

        TemplateQuestion::create([
            'category_id'   => $categories['Python'],
            'question_text' => 'Pythonでデコレータを定義する方法は？',
            'answer'        => '@decorator_name',
            'hint'          => '@デコレータ名',
            'difficulty'    => 'hard',
        ]);
    }
}
