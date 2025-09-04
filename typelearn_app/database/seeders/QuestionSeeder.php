<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Category;
use App\Models\User;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();
        

        // 初級（easy）の問題 - 30問
        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => '<h1>タグは何を意味しますか？',
            'correct_answer' => '見出し1',
            'hint' => '文章のタイトルに使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで文字色を指定するプロパティは？',
            'correct_answer' => 'color',
            'hint' => '背景色じゃない方です',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで配列を作成する方法は？',
            'correct_answer' => 'var arr = [];',
            'hint' => 'var 変数名 = [];',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで配列を作成する方法は？',
            'correct_answer' => '$arr = [];',
            'hint' => '$変数名 = [];',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでデータを取得する方法は？',
            'correct_answer' => 'SELECT * FROM テーブル名;',
            'hint' => 'SELECT 列名 FROM テーブル名;',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonで配列を作成する方法は？',
            'correct_answer' => 'arr = []',
            'hint' => '変数名 = []',
            'difficulty' => 'easy',
        ]);

        // HTML 初級追加問題
        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => '<p>タグは何を意味しますか？',
            'correct_answer' => '段落',
            'hint' => '文章の段落を作成します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => '<a>タグは何を意味しますか？',
            'correct_answer' => 'リンク',
            'hint' => '他のページへのリンクを作成します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => '<img>タグは何を意味しますか？',
            'correct_answer' => '画像',
            'hint' => '画像を表示します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => '<ul>タグは何を意味しますか？',
            'correct_answer' => '番号なしリスト',
            'hint' => '箇条書きのリストを作成します',
            'difficulty' => 'easy',
        ]);

        // CSS 初級追加問題
        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで背景色を指定するプロパティは？',
            'correct_answer' => 'background-color',
            'hint' => '要素の背景色を設定します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSでフォントサイズを指定するプロパティは？',
            'correct_answer' => 'font-size',
            'hint' => '文字の大きさを設定します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSでテキストを中央寄せにするプロパティは？',
            'correct_answer' => 'text-align: center',
            'hint' => 'テキストを中央に配置します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで要素の幅を指定するプロパティは？',
            'correct_answer' => 'width',
            'hint' => '要素の幅を設定します',
            'difficulty' => 'easy',
        ]);

        // JavaScript 初級追加問題
        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで変数を宣言するキーワードは？',
            'correct_answer' => 'var',
            'hint' => '変数を宣言する基本的なキーワードです',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで関数を定義するキーワードは？',
            'correct_answer' => 'function',
            'hint' => '関数を定義するキーワードです',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで条件分岐を書くキーワードは？',
            'correct_answer' => 'if',
            'hint' => '条件に応じて処理を分岐させます',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでループを書くキーワードは？',
            'correct_answer' => 'for',
            'hint' => '繰り返し処理を書きます',
            'difficulty' => 'easy',
        ]);

        // PHP 初級追加問題
        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで変数を宣言する記号は？',
            'correct_answer' => '$',
            'hint' => '変数名の前に付けます',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで文字列を出力する関数は？',
            'correct_answer' => 'echo',
            'correct_answer' => 'echo',
            'hint' => '文字列を画面に表示します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで配列の要素数を取得する関数は？',
            'correct_answer' => 'count',
            'hint' => '配列の要素数を数えます',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで文字列の長さを取得する関数は？',
            'correct_answer' => 'strlen',
            'hint' => '文字列の文字数を数えます',
            'difficulty' => 'easy',
        ]);

        // SQL 初級追加問題
        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでデータを挿入する命令は？',
            'correct_answer' => 'INSERT',
            'hint' => '新しいデータをテーブルに追加します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでデータを更新する命令は？',
            'correct_answer' => 'UPDATE',
            'hint' => '既存のデータを変更します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでデータを削除する命令は？',
            'correct_answer' => 'DELETE',
            'hint' => 'テーブルからデータを削除します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでテーブルを作成する命令は？',
            'correct_answer' => 'CREATE TABLE',
            'hint' => '新しいテーブルを作成します',
            'difficulty' => 'easy',
        ]);

        // Python 初級追加問題
        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonで文字列を出力する関数は？',
            'correct_answer' => 'print',
            'hint' => '文字列を画面に表示します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでリストを作成する記号は？',
            'correct_answer' => '[]',
            'hint' => '角括弧でリストを作成します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonで辞書を作成する記号は？',
            'correct_answer' => '{}',
            'hint' => '波括弧で辞書を作成します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonで条件分岐を書くキーワードは？',
            'correct_answer' => 'if',
            'hint' => '条件に応じて処理を分岐させます',
            'difficulty' => 'easy',
        ]);

        // 中級（medium）の問題 - 30問
        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでフォームを作成するタグは？',
            'correct_answer' => '<form>',
            'hint' => 'フォームの開始タグです',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで要素を中央寄せにする方法は？',
            'correct_answer' => 'margin: 0 auto;',
            'hint' => 'marginプロパティを使います',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでイベントリスナーを追加する方法は？',
            'correct_answer' => 'addEventListener',
            'hint' => 'addEventListener(イベント名, 関数)',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでセッションを開始する関数は？',
            'correct_answer' => 'session_start()',
            'hint' => 'session_start()',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでテーブルを結合する方法は？',
            'correct_answer' => 'JOIN',
            'hint' => 'JOIN テーブル名 ON 条件',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでクラスを定義する方法は？',
            'correct_answer' => 'class クラス名:',
            'hint' => 'class クラス名:',
            'difficulty' => 'medium',
        ]);

        // HTML 中級追加問題
        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでテーブルを作成するタグは？',
            'correct_answer' => '<table>',
            'hint' => 'テーブルの開始タグです',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLで入力フィールドを作成するタグは？',
            'correct_answer' => '<input>',
            'hint' => 'ユーザーからの入力を受け取ります',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでセレクトボックスを作成するタグは？',
            'correct_answer' => '<select>',
            'hint' => '選択肢から選ぶボックスを作成します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでチェックボックスを作成するタグは？',
            'correct_answer' => '<input type="checkbox">',
            'hint' => '複数選択可能なチェックボックスです',
            'difficulty' => 'medium',
        ]);

        // CSS 中級追加問題
        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで要素を絶対位置に配置するプロパティは？',
            'correct_answer' => 'position: absolute',
            'hint' => '親要素を基準に配置します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで要素を相対位置に配置するプロパティは？',
            'correct_answer' => 'position: relative',
            'hint' => '元の位置を基準に配置します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで要素を固定位置に配置するプロパティは？',
            'correct_answer' => 'position: fixed',
            'hint' => '画面の固定位置に配置します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで要素を非表示にするプロパティは？',
            'correct_answer' => 'display: none',
            'hint' => '要素を完全に非表示にします',
            'difficulty' => 'medium',
        ]);

        // JavaScript 中級追加問題
        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでオブジェクトを作成する記号は？',
            'correct_answer' => '{}',
            'hint' => '波括弧でオブジェクトを作成します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで配列の要素を追加するメソッドは？',
            'correct_answer' => 'push',
            'hint' => '配列の末尾に要素を追加します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで配列の要素を削除するメソッドは？',
            'correct_answer' => 'pop',
            'hint' => '配列の末尾の要素を削除します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptで文字列を分割するメソッドは？',
            'correct_answer' => 'split',
            'hint' => '指定した区切り文字で文字列を分割します',
            'difficulty' => 'medium',
        ]);

        // PHP 中級追加問題
        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでファイルを読み込む関数は？',
            'correct_answer' => 'file_get_contents',
            'hint' => 'ファイルの内容を文字列として読み込みます',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでファイルに書き込む関数は？',
            'correct_answer' => 'file_put_contents',
            'hint' => '文字列をファイルに書き込みます',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでディレクトリを作成する関数は？',
            'correct_answer' => 'mkdir',
            'hint' => '新しいディレクトリを作成します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでファイルの存在を確認する関数は？',
            'correct_answer' => 'file_exists',
            'hint' => 'ファイルが存在するかチェックします',
            'difficulty' => 'medium',
        ]);

        // SQL 中級追加問題
        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでデータをグループ化する句は？',
            'correct_answer' => 'GROUP BY',
            'hint' => '指定した列でデータをグループ化します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLで条件を指定する句は？',
            'correct_answer' => 'WHERE',
            'hint' => 'データを絞り込む条件を指定します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLで結果を並び替える句は？',
            'correct_answer' => 'ORDER BY',
            'hint' => '結果を指定した列で並び替えます',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLで結果の件数を制限する句は？',
            'correct_answer' => 'LIMIT',
            'hint' => '取得する件数を制限します',
            'difficulty' => 'medium',
        ]);

        // Python 中級追加問題
        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでファイルを読み込む関数は？',
            'correct_answer' => 'open',
            'hint' => 'ファイルを開いて読み込みます',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでファイルに書き込む関数は？',
            'correct_answer' => 'write',
            'hint' => 'ファイルに文字列を書き込みます',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでディレクトリを作成する関数は？',
            'correct_answer' => 'os.mkdir',
            'hint' => '新しいディレクトリを作成します',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでファイルの存在を確認する関数は？',
            'correct_answer' => 'os.path.exists',
            'hint' => 'ファイルが存在するかチェックします',
            'difficulty' => 'medium',
        ]);

        // 上級（hard）の問題 - 30問
        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでセマンティックなマークアップをする際の主要なタグは？',
            'correct_answer' => '<header><nav><main><section><article><footer>',
            'hint' => 'header, nav, main, section, article, footer',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSでレスポンシブデザインを実現するメディアクエリは？',
            'correct_answer' => '@media (max-width: 768px)',
            'hint' => '@media (max-width: 画面幅)',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでPromiseを使った非同期処理の書き方は？',
            'correct_answer' => 'new Promise((resolve, reject) => {})',
            'hint' => 'new Promise((resolve, reject) => {})',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでPDOを使ったデータベース接続の書き方は？',
            'correct_answer' => 'new PDO("mysql:host=localhost;dbname=test", "user", "pass")',
            'hint' => 'new PDO("mysql:host=ホスト;dbname=DB名", "ユーザー", "パス")',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでサブクエリを使った複雑なクエリの例は？',
            'correct_answer' => 'SELECT * FROM users WHERE id IN (SELECT user_id FROM orders)',
            'hint' => 'SELECT * FROM テーブル WHERE 列 IN (サブクエリ)',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでデコレータを定義する方法は？',
            'correct_answer' => '@decorator_name',
            'hint' => '@デコレータ名',
            'difficulty' => 'hard',
        ]);

        // HTML 上級追加問題
        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでアクセシビリティを向上させるaria属性の例は？',
            'correct_answer' => 'aria-label, aria-describedby, aria-hidden',
            'hint' => 'スクリーンリーダー用の属性です',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでメタデータを設定するタグは？',
            'correct_answer' => '<meta>',
            'hint' => 'ページの情報を設定します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLで外部リソースを読み込むタグは？',
            'correct_answer' => '<link>',
            'hint' => 'CSSファイルなどを読み込みます',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['HTML'],
            'question_text' => 'HTMLでスクリプトを読み込むタグは？',
            'correct_answer' => '<script>',
            'hint' => 'JavaScriptファイルなどを読み込みます',
            'difficulty' => 'hard',
        ]);

        // CSS 上級追加問題
        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSでアニメーションを作成するプロパティは？',
            'correct_answer' => 'animation',
            'hint' => '要素にアニメーションを適用します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSで変数を定義するプロパティは？',
            'correct_answer' => '--変数名',
            'hint' => 'カスタムプロパティで変数を定義します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSでグリッドレイアウトを作成するプロパティは？',
            'correct_answer' => 'display: grid',
            'hint' => 'グリッドベースのレイアウトを作成します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'question_text' => 'CSSでフレックスボックスレイアウトを作成するプロパティは？',
            'correct_answer' => 'display: flex',
            'hint' => 'フレックスベースのレイアウトを作成します',
            'difficulty' => 'hard',
        ]);

        // JavaScript 上級追加問題
        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでasync/awaitを使った非同期処理の書き方は？',
            'correct_answer' => 'async function() { await promise; }',
            'hint' => 'async/awaitで非同期処理を同期的に書けます',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでクラスを定義するキーワードは？',
            'correct_answer' => 'class',
            'hint' => 'ES6で導入されたクラス構文です',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでモジュールを読み込む構文は？',
            'correct_answer' => 'import',
            'hint' => 'ES6で導入されたモジュール構文です',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['JavaScript'],
            'question_text' => 'JavaScriptでモジュールをエクスポートする構文は？',
            'correct_answer' => 'export',
            'hint' => '関数やクラスを他のファイルで使えるようにします',
            'difficulty' => 'hard',
        ]);

        // PHP 上級追加問題
        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで名前空間を定義するキーワードは？',
            'correct_answer' => 'namespace',
            'hint' => 'クラスや関数の名前の衝突を防ぎます',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでトレイトを定義するキーワードは？',
            'correct_answer' => 'trait',
            'hint' => 'クラス間でコードを再利用できます',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPでインターフェースを定義するキーワードは？',
            'correct_answer' => 'interface',
            'hint' => 'クラスが実装すべきメソッドを定義します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['PHP'],
            'question_text' => 'PHPで抽象クラスを定義するキーワードは？',
            'correct_answer' => 'abstract',
            'hint' => '直接インスタンス化できないクラスです',
            'difficulty' => 'hard',
        ]);

        // SQL 上級追加問題
        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでビューを作成する命令は？',
            'correct_answer' => 'CREATE VIEW',
            'hint' => '仮想的なテーブルを作成します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでストアドプロシージャを作成する命令は？',
            'correct_answer' => 'CREATE PROCEDURE',
            'hint' => '複数のSQL文をまとめて実行できます',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでトリガーを作成する命令は？',
            'correct_answer' => 'CREATE TRIGGER',
            'hint' => '特定の操作が実行された時に自動で処理を実行します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'question_text' => 'SQLでインデックスを作成する命令は？',
            'correct_answer' => 'CREATE INDEX',
            'hint' => '検索の速度を向上させます',
            'difficulty' => 'hard',
        ]);

        // Python 上級追加問題
        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでジェネレータを定義するキーワードは？',
            'correct_answer' => 'yield',
            'hint' => 'メモリ効率の良いイテレータを作成します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでコンテキストマネージャーを作成するキーワードは？',
            'correct_answer' => 'with',
            'hint' => 'リソースの自動管理を行います',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでメタクラスを定義するキーワードは？',
            'correct_answer' => 'metaclass',
            'hint' => 'クラスのクラスを定義します',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['Python'],
            'question_text' => 'Pythonでプロパティを定義するデコレータは？',
            'correct_answer' => '@property',
            'hint' => 'メソッドをプロパティとして扱えます',
            'difficulty' => 'hard',
        ]);
        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }

    
}