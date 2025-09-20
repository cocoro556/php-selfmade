<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class JavaQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // Javaの問題
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでメイン関数を定義するメソッド名は？',
            'correct_answer' => 'main',
            'hint' => 'プログラムの開始点です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列を出力するメソッドは？',
            'correct_answer' => 'System.out.println',
            'hint' => 'コンソールに文字を表示します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで整数型を表すデータ型は？',
            'correct_answer' => 'int',
            'hint' => 'integerの略です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列型を表すデータ型は？',
            'correct_answer' => 'String',
            'hint' => '文字の集合を表します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで真偽値を表すデータ型は？',
            'correct_answer' => 'boolean',
            'hint' => 'trueまたはfalseの値です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで小数を表すデータ型は？',
            'correct_answer' => 'double',
            'hint' => '浮動小数点数です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字型を表すデータ型は？',
            'correct_answer' => 'char',
            'hint' => 'characterの略で1文字だけです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで条件分岐を行うキーワードは？',
            'correct_answer' => 'if',
            'hint' => '条件が真の場合に実行します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで繰り返し処理を行うキーワードは？',
            'correct_answer' => 'for',
            'hint' => '指定回数ループします',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで条件が真の間ループするキーワードは？',
            'correct_answer' => 'while',
            'hint' => '条件をチェックしながら繰り返します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで配列の各要素をループするキーワードは？',
            'correct_answer' => 'for-each',
            'hint' => '拡張for文とも呼ばれます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでクラスを定義するキーワードは？',
            'correct_answer' => 'class',
            'hint' => 'オブジェクトの設計図です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでオブジェクトを作成するキーワードは？',
            'correct_answer' => 'new',
            'hint' => 'インスタンスを生成します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでメソッドの戻り値がない場合のキーワードは？',
            'correct_answer' => 'void',
            'hint' => '何も返さないメソッドです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでクラスメンバーを外部から隠すキーワードは？',
            'correct_answer' => 'private',
            'hint' => 'カプセル化の基本です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでクラスメンバーを外部に公開するキーワードは？',
            'correct_answer' => 'public',
            'hint' => 'どこからでもアクセス可能です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで継承を行うキーワードは？',
            'correct_answer' => 'extends',
            'hint' => '親クラスの機能を受け継ぎます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでインターフェースを実装するキーワードは？',
            'correct_answer' => 'implements',
            'hint' => 'インターフェースの契約を実現します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで抽象クラスを定義するキーワードは？',
            'correct_answer' => 'abstract',
            'hint' => 'インスタンス化できないクラスです',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで静的メンバーを定義するキーワードは？',
            'correct_answer' => 'static',
            'hint' => 'クラス名で直接アクセスできます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで定数を定義するキーワードは？',
            'correct_answer' => 'final',
            'hint' => '値を変更できない変数です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで例外を投げるキーワードは？',
            'correct_answer' => 'throw',
            'hint' => 'エラーを発生させます',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでメソッドが例外を投げる可能性を宣言するキーワードは？',
            'correct_answer' => 'throws',
            'hint' => 'メソッド宣言で使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで配列を宣言するときに使う記号は？',
            'correct_answer' => '[]',
            'hint' => '角括弧を使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで配列の長さを取得するプロパティは？',
            'correct_answer' => 'length',
            'hint' => '配列のサイズを調べます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列の長さを取得するメソッドは？',
            'correct_answer' => 'length()',
            'hint' => 'Stringクラスのメソッドです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列を比較するメソッドは？',
            'correct_answer' => 'equals()',
            'hint' => '==ではなくこのメソッドを使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列を大文字に変換するメソッドは？',
            'correct_answer' => 'toUpperCase()',
            'hint' => 'すべての文字を大文字にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列を小文字に変換するメソッドは？',
            'correct_answer' => 'toLowerCase()',
            'hint' => 'すべての文字を小文字にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaで文字列の一部を切り出すメソッドは？',
            'correct_answer' => 'substring()',
            'hint' => '指定した範囲の文字列を取得します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Java'],
            'content' => 'Javaでリストを作成するインターフェースは？',
            'correct_answer' => 'List',
            'hint' => 'ArrayListなどで実装します',
            'difficulty' => 'medium',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}