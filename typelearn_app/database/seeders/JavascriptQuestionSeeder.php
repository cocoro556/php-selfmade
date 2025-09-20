<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class JavascriptQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // JavaScriptの問題
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでコンソールに出力する関数は？',
            'correct_answer' => 'console.log()',
            'hint' => 'デバッグでよく使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで変数を宣言するキーワードは？',
            'correct_answer' => 'var',
            'hint' => '古い方法ですが基本です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでブロックスコープの変数を宣言するキーワードは？',
            'correct_answer' => 'let',
            'hint' => 'ES6で追加された新しい方法です',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで定数を宣言するキーワードは？',
            'correct_answer' => 'const',
            'hint' => '値を変更できない変数です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで関数を定義するキーワードは？',
            'correct_answer' => 'function',
            'hint' => '再利用可能なコードブロックです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで条件分岐を行うキーワードは？',
            'correct_answer' => 'if',
            'hint' => '条件が真の場合に実行します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで繰り返し処理を行うキーワードは？',
            'correct_answer' => 'for',
            'hint' => '指定回数ループします',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列を定義するときに使う記号は？',
            'correct_answer' => '[]',
            'hint' => '角括弧を使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでオブジェクトを定義するときに使う記号は？',
            'correct_answer' => '{}',
            'hint' => '波括弧を使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列の長さを取得するプロパティは？',
            'correct_answer' => 'length',
            'hint' => '配列のサイズを調べます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列に要素を追加するメソッドは？',
            'correct_answer' => 'push()',
            'hint' => '配列の最後に要素を追加します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列の最後の要素を削除するメソッドは？',
            'correct_answer' => 'pop()',
            'hint' => '削除と同時に値を返します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでDOM要素を取得するメソッドは？',
            'correct_answer' => 'getElementById()',
            'hint' => 'IDを指定して要素を取得します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでイベントリスナーを追加するメソッドは？',
            'correct_answer' => 'addEventListener()',
            'hint' => 'クリックなどのイベントを監視します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで文字列を数値に変換する関数は？',
            'correct_answer' => 'parseInt()',
            'hint' => '文字列を整数にします',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで小数を含む数値に変換する関数は？',
            'correct_answer' => 'parseFloat()',
            'hint' => '文字列を浮動小数点数にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列の各要素に処理を行うメソッドは？',
            'correct_answer' => 'forEach()',
            'hint' => '配列の全要素を順番に処理します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列をフィルタリングするメソッドは？',
            'correct_answer' => 'filter()',
            'hint' => '条件に合う要素だけを取り出します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列を変換するメソッドは？',
            'correct_answer' => 'map()',
            'hint' => '各要素を別の値に変換します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで配列から特定の要素を検索するメソッドは？',
            'correct_answer' => 'find()',
            'hint' => '条件に合う最初の要素を返します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで非同期処理を行うキーワードは？',
            'correct_answer' => 'async',
            'hint' => 'awaitと組み合わせて使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで非同期処理の完了を待つキーワードは？',
            'correct_answer' => 'await',
            'hint' => 'asyncと組み合わせて使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでPromiseを作成するキーワードは？',
            'correct_answer' => 'Promise',
            'hint' => '非同期処理の結果を表現します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでHTTPリクエストを送信する関数は？',
            'correct_answer' => 'fetch()',
            'hint' => 'APIとの通信に使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでJSONを解析する関数は？',
            'correct_answer' => 'JSON.parse()',
            'hint' => 'JSON文字列をオブジェクトにします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでオブジェクトをJSONに変換する関数は？',
            'correct_answer' => 'JSON.stringify()',
            'hint' => 'オブジェクトをJSON文字列にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで指定時間後に処理を実行する関数は？',
            'correct_answer' => 'setTimeout()',
            'hint' => '遅延実行に使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで一定間隔で処理を繰り返す関数は？',
            'correct_answer' => 'setInterval()',
            'hint' => '定期実行に使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptでアロー関数を定義する記号は？',
            'correct_answer' => '=>',
            'hint' => 'ES6で追加された短縮記法です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['JavaScript'],
            'content' => 'JavaScriptで厳密等価演算子は？',
            'correct_answer' => '===',
            'hint' => '型も含めて比較します',
            'difficulty' => 'medium',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}