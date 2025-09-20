<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class PhpQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // PHPの問題
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPコードの開始タグは？',
            'correct_answer' => '<?php',
            'hint' => 'PHPファイルの最初に書きます',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで変数を定義するときに使う記号は？',
            'correct_answer' => '$',
            'hint' => 'ドル記号を変数名の前に付けます',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで文字列を出力する関数は？',
            'correct_answer' => 'echo',
            'hint' => '画面に文字を表示します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列を定義する関数は？',
            'correct_answer' => 'array()',
            'hint' => '複数の値をまとめて保存します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列の要素数を取得する関数は？',
            'correct_answer' => 'count()',
            'hint' => '配列の長さを調べます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで文字列の長さを取得する関数は？',
            'correct_answer' => 'strlen()',
            'hint' => 'string lengthの略です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで条件分岐を行うキーワードは？',
            'correct_answer' => 'if',
            'hint' => '条件が真の場合に実行します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでループ処理を行うキーワードは？',
            'correct_answer' => 'for',
            'hint' => '指定回数繰り返します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列の各要素に対してループするキーワードは？',
            'correct_answer' => 'foreach',
            'hint' => '配列の全要素を順番に処理します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで関数を定義するキーワードは？',
            'correct_answer' => 'function',
            'hint' => '再利用可能なコードブロックを作ります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでクラスを定義するキーワードは？',
            'correct_answer' => 'class',
            'hint' => 'オブジェクト指向プログラミングの基本です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでクラスのインスタンスを作成するキーワードは？',
            'correct_answer' => 'new',
            'hint' => 'オブジェクトを生成します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで他のファイルを読み込むキーワードは？',
            'correct_answer' => 'include',
            'hint' => '外部ファイルの内容を取り込みます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで必須ファイルを読み込むキーワードは？',
            'correct_answer' => 'require',
            'hint' => 'ファイルが見つからないとエラーになります',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列に要素を追加する関数は？',
            'correct_answer' => 'array_push()',
            'hint' => '配列の最後に新しい要素を追加します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列の最後の要素を削除する関数は？',
            'correct_answer' => 'array_pop()',
            'hint' => '配列の末尾から要素を取り出します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで文字列を分割する関数は？',
            'correct_answer' => 'explode()',
            'hint' => '区切り文字で文字列を配列に変換します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列を文字列に結合する関数は？',
            'correct_answer' => 'implode()',
            'hint' => '配列の要素を区切り文字で繋げます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで現在の日時を取得する関数は？',
            'correct_answer' => 'date()',
            'hint' => 'フォーマットを指定して日時を表示します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで乱数を生成する関数は？',
            'correct_answer' => 'rand()',
            'hint' => 'ランダムな数値を作ります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでファイルを開く関数は？',
            'correct_answer' => 'fopen()',
            'hint' => 'file openの略です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでファイルを読み込む関数は？',
            'correct_answer' => 'fread()',
            'hint' => 'file readの略です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでファイルに書き込む関数は？',
            'correct_answer' => 'fwrite()',
            'hint' => 'file writeの略です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでファイルを閉じる関数は？',
            'correct_answer' => 'fclose()',
            'hint' => 'file closeの略です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでJSONを配列に変換する関数は？',
            'correct_answer' => 'json_decode()',
            'hint' => 'JSON形式の文字列を配列にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで配列をJSONに変換する関数は？',
            'correct_answer' => 'json_encode()',
            'hint' => '配列をJSON形式の文字列にします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでセッションを開始する関数は？',
            'correct_answer' => 'session_start()',
            'hint' => 'ユーザーの状態を管理します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでクッキーを設定する関数は？',
            'correct_answer' => 'setcookie()',
            'hint' => 'ブラウザに情報を保存します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPでデータベースに接続するPDOのメソッドは？',
            'correct_answer' => 'new PDO()',
            'hint' => 'データベース接続オブジェクトを作成します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで例外処理を行うキーワードは？',
            'correct_answer' => 'try',
            'hint' => 'catchと組み合わせて使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['PHP'],
            'content' => 'PHPで例外をキャッチするキーワードは？',
            'correct_answer' => 'catch',
            'hint' => 'tryブロックのエラーを処理します',
            'difficulty' => 'hard',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}