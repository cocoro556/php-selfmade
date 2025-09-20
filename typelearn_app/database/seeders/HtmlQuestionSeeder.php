<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class HtmlQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // HTMLの問題
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで見出しタグの最も大きいレベルは？',
            'correct_answer' => 'h1',
            'hint' => '1から6まであります',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで段落を表すタグは？',
            'correct_answer' => 'p',
            'hint' => 'paragraphの略です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで改行を表すタグは？',
            'correct_answer' => 'br',
            'hint' => 'breakの略で自己完結タグです',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでリンクを作成するタグは？',
            'correct_answer' => 'a',
            'hint' => 'anchorの略でhref属性が必要です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで画像を表示するタグは？',
            'correct_answer' => 'img',
            'hint' => 'imageの略で自己完結タグです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでリストを作成するタグは？',
            'correct_answer' => 'ul',
            'hint' => 'unordered listの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで番号付きリストを作成するタグは？',
            'correct_answer' => 'ol',
            'hint' => 'ordered listの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでリストの項目を表すタグは？',
            'correct_answer' => 'li',
            'hint' => 'list itemの略です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでテーブルを作成するタグは？',
            'correct_answer' => 'table',
            'hint' => '表を作るときに使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでテーブルの行を表すタグは？',
            'correct_answer' => 'tr',
            'hint' => 'table rowの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでテーブルのセルを表すタグは？',
            'correct_answer' => 'td',
            'hint' => 'table dataの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでテーブルのヘッダーセルを表すタグは？',
            'correct_answer' => 'th',
            'hint' => 'table headerの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでフォームを作成するタグは？',
            'correct_answer' => 'form',
            'hint' => 'ユーザーからの入力を受け取ります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでテキスト入力欄を作るタグは？',
            'correct_answer' => 'input',
            'hint' => 'type属性でtextを指定します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで複数行のテキスト入力欄を作るタグは？',
            'correct_answer' => 'textarea',
            'hint' => '長い文章を入力するときに使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでボタンを作成するタグは？',
            'correct_answer' => 'button',
            'hint' => 'クリックできる要素を作ります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでドロップダウンリストを作るタグは？',
            'correct_answer' => 'select',
            'hint' => 'optionタグと組み合わせます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでドロップダウンの選択肢を表すタグは？',
            'correct_answer' => 'option',
            'hint' => 'selectタグの中に入れます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでチェックボックスを作るinputのtype属性は？',
            'correct_answer' => 'checkbox',
            'hint' => '複数選択可能な入力欄です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでラジオボタンを作るinputのtype属性は？',
            'correct_answer' => 'radio',
            'hint' => '1つだけ選択可能な入力欄です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで太字にするタグは？',
            'correct_answer' => 'strong',
            'hint' => '重要な文字を強調します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで斜体にするタグは？',
            'correct_answer' => 'em',
            'hint' => 'emphasizeの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでブロック要素を作る汎用タグは？',
            'correct_answer' => 'div',
            'hint' => 'divisionの略でレイアウトに使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでインライン要素を作る汎用タグは？',
            'correct_answer' => 'span',
            'hint' => '文字の一部を装飾するときに使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでページのタイトルを設定するタグは？',
            'correct_answer' => 'title',
            'hint' => 'ブラウザのタブに表示されます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでページの基本情報を記述する部分のタグは？',
            'correct_answer' => 'head',
            'hint' => 'titleやmetaタグを入れます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでページの表示内容を記述する部分のタグは？',
            'correct_answer' => 'body',
            'hint' => 'ユーザーに見える部分です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでHTML文書の開始を表すタグは？',
            'correct_answer' => 'html',
            'hint' => 'ページ全体を囲むタグです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLでコメントを書く記法は？',
            'correct_answer' => '<!-- -->',
            'hint' => 'ブラウザには表示されません',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで水平線を引くタグは？',
            'correct_answer' => 'hr',
            'hint' => 'horizontal ruleの略です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['HTML'],
            'content' => 'HTMLで引用文を表すタグは？',
            'correct_answer' => 'blockquote',
            'hint' => '他の文章からの引用に使います',
            'difficulty' => 'medium',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}