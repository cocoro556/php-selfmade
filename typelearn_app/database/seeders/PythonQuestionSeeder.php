<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class PythonQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // Pythonの問題
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで文字列を出力する関数は？',
            'correct_answer' => 'print()',
            'hint' => 'コンソールに文字を表示します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでユーザーからの入力を受け取る関数は？',
            'correct_answer' => 'input()',
            'hint' => 'キーボードからの入力を取得します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでリストを定義するときに使う記号は？',
            'correct_answer' => '[]',
            'hint' => '角括弧を使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで辞書を定義するときに使う記号は？',
            'correct_answer' => '{}',
            'hint' => '波括弧を使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでタプルを定義するときに使う記号は？',
            'correct_answer' => '()',
            'hint' => '丸括弧を使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで条件分岐を行うキーワードは？',
            'correct_answer' => 'if',
            'hint' => '条件が真の場合に実行します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで条件が偽の場合を表すキーワードは？',
            'correct_answer' => 'else',
            'hint' => 'ifの反対の条件です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで追加の条件を表すキーワードは？',
            'correct_answer' => 'elif',
            'hint' => 'else ifの略です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで繰り返し処理を行うキーワードは？',
            'correct_answer' => 'for',
            'hint' => 'リストの要素を順番に処理します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで条件が真の間ループするキーワードは？',
            'correct_answer' => 'while',
            'hint' => '条件をチェックしながら繰り返します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで関数を定義するキーワードは？',
            'correct_answer' => 'def',
            'hint' => 'defineの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで関数から値を返すキーワードは？',
            'correct_answer' => 'return',
            'hint' => '計算結果を呼び出し元に返します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでクラスを定義するキーワードは？',
            'correct_answer' => 'class',
            'hint' => 'オブジェクトの設計図です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでモジュールを読み込むキーワードは？',
            'correct_answer' => 'import',
            'hint' => '外部のライブラリを使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでモジュールの一部だけを読み込むキーワードは？',
            'correct_answer' => 'from',
            'hint' => 'importと組み合わせて使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでリストに要素を追加するメソッドは？',
            'correct_answer' => 'append()',
            'hint' => 'リストの最後に要素を追加します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでリストから要素を削除するメソッドは？',
            'correct_answer' => 'remove()',
            'hint' => '指定した値の要素を削除します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでリストの最後の要素を削除して取得するメソッドは？',
            'correct_answer' => 'pop()',
            'hint' => '削除と同時に値を返します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで文字列を分割するメソッドは？',
            'correct_answer' => 'split()',
            'hint' => '区切り文字でリストに変換します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでリストを文字列に結合するメソッドは？',
            'correct_answer' => 'join()',
            'hint' => '区切り文字で繋げて文字列にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで数値の型を調べる関数は？',
            'correct_answer' => 'type()',
            'hint' => '変数のデータ型を確認します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで文字列を数値に変換する関数は？',
            'correct_answer' => 'int()',
            'hint' => '文字列を整数にします',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで数値を文字列に変換する関数は？',
            'correct_answer' => 'str()',
            'hint' => '数値を文字列にします',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで範囲を指定する関数は？',
            'correct_answer' => 'range()',
            'hint' => 'forループでよく使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでリストの長さを取得する関数は？',
            'correct_answer' => 'len()',
            'hint' => 'lengthの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで例外処理を行うキーワードは？',
            'correct_answer' => 'try',
            'hint' => 'exceptと組み合わせて使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで例外をキャッチするキーワードは？',
            'correct_answer' => 'except',
            'hint' => 'tryブロックのエラーを処理します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでファイルを開く関数は？',
            'correct_answer' => 'open()',
            'hint' => 'ファイルの読み書きに使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで辞書のキーを取得するメソッドは？',
            'correct_answer' => 'keys()',
            'hint' => '辞書の全てのキーを取得します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonで辞書の値を取得するメソッドは？',
            'correct_answer' => 'values()',
            'hint' => '辞書の全ての値を取得します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Python'],
            'content' => 'Pythonでループを強制終了するキーワードは？',
            'correct_answer' => 'break',
            'hint' => 'ループから抜け出します',
            'difficulty' => 'medium',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}