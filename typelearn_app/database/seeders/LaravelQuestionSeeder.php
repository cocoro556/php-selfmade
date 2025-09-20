<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class LaravelQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

         // Laravelの問題
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでデータベースのテーブルを作成するコマンドは？',
            'correct_answer' => 'php artisan make:migration',
            'hint' => 'artisanコマンドを使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでモデルを作成するコマンドは？',
            'correct_answer' => 'php artisan make:model',
            'hint' => 'artisanコマンドを使います',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでコントローラーを作成するコマンドは？',
            'correct_answer' => 'php artisan make:controller',
            'hint' => 'artisanコマンドを使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでルート定義を記述するファイルは？',
            'correct_answer' => 'web.php',
            'hint' => 'routesディレクトリにあります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでビューの拡張子は？',
            'correct_answer' => 'blade.php',
            'hint' => 'テンプレートエンジンの名前と同じです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelの公式パッケージ管理ツールは？',
            'correct_answer' => 'composer',
            'hint' => 'PHPの依存関係管理ツールです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelの設定ファイルが置かれているディレクトリは？',
            'correct_answer' => 'config',
            'hint' => 'アプリの各種設定はここにあります',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでキャッシュをクリアするコマンドは？',
            'correct_answer' => 'php artisan cache:clear',
            'hint' => 'artisanコマンドでcacheを操作します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでデータベースをマイグレーションするコマンドは？',
            'correct_answer' => 'php artisan migrate',
            'hint' => 'artisan migrateでテーブルを作成します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで新しいSeederを作成するコマンドは？',
            'correct_answer' => 'php artisan make:seeder',
            'hint' => 'Seederクラスを作ります',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでファクトリを作成するコマンドは？',
            'correct_answer' => 'php artisan make:factory',
            'hint' => 'テストデータ生成用のクラスを作ります',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelの認証機能を簡単に導入できる公式パッケージは？',
            'correct_answer' => 'breeze',
            'hint' => 'Jetstreamより軽量な認証スキャフォールドです',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでキューを処理するコマンドは？',
            'correct_answer' => 'php artisan queue:work',
            'hint' => 'queueを処理するワーカーを起動します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでテストを実行するコマンドは？',
            'correct_answer' => 'php artisan test',
            'hint' => 'PHPUnitを利用して実行されます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでルート一覧を表示するコマンドは？',
            'correct_answer' => 'php artisan route:list',
            'hint' => 'routeの確認に使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでキャッシュされた設定をクリアするコマンドは？',
            'correct_answer' => 'php artisan config:clear',
            'hint' => 'configキャッシュをリセットします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでスケジュールを1分ごとに実行するために利用する仕組みは？',
            'correct_answer' => 'cron',
            'hint' => 'Linuxのタスクスケジューラです',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'LaravelでAPIルートを定義するファイルは？',
            'correct_answer' => 'api.php',
            'hint' => 'routesフォルダの中にあります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでエラーログが保存されるディレクトリは？',
            'correct_answer' => 'storage',
            'hint' => 'ログやキャッシュが入るフォルダです',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで利用されているテンプレートエンジンは？',
            'correct_answer' => 'blade',
            'hint' => 'ファイル拡張子に入っています',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで環境変数を管理するファイル名は？',
            'correct_answer' => '.env',
            'hint' => 'アプリの設定を切り替えるのに使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでイベントをリッスンするクラスを作成するコマンドは？',
            'correct_answer' => 'php artisan make:listener',
            'hint' => 'イベントと組み合わせて使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでミドルウェアを作成するコマンドは？',
            'correct_answer' => 'php artisan make:middleware',
            'hint' => 'HTTPリクエストの前処理に使います',
            'difficulty' => 'hard',
        ]);

        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'LaravelでGETリクエストのルートを定義するメソッドは？',
            'correct_answer' => 'Route::get()',
            'hint' => 'ルート定義で最も基本的に使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'LaravelでPOSTリクエストのルートを定義するメソッドは？',
            'correct_answer' => 'Route::post()',
            'hint' => 'フォーム送信などで使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで全レコードを取得するメソッドは？',
            'correct_answer' => 'Model::all()',
            'hint' => 'Eloquentモデルで全件取得するときに使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで主キーを使って1件のレコードを取得するメソッドは？',
            'correct_answer' => 'Model::find()',
            'hint' => 'ID指定でレコードを検索できます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで条件付きクエリを作成するメソッドは？',
            'correct_answer' => 'where()',
            'hint' => 'SQLのWHERE句に相当します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで最初にアプリケーションを起動するコマンドは？',
            'correct_answer' => 'php artisan serve',
            'hint' => 'ローカル開発サーバを立ち上げます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでルート一覧を確認するコマンドは？',
            'correct_answer' => 'php artisan route:list',
            'hint' => 'ルートの定義を表形式で表示します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでデータベースに新しいテーブルを作成するクラスを何という？',
            'correct_answer' => 'Migration',
            'hint' => 'スキーマを定義する仕組みです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでデータを投入するためのクラスを何という？',
            'correct_answer' => 'Seeder',
            'hint' => 'テスト用データや初期データに使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで大量のテストデータを自動生成するための仕組みは？',
            'correct_answer' => 'Factory',
            'hint' => 'モデルごとにダミーデータを生成できます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでデータベースのマイグレーションをリセットするコマンドは？',
            'correct_answer' => 'php artisan migrate:reset',
            'hint' => '全てのマイグレーションを取り消します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでテーブルを全削除してマイグレーションを再実行するコマンドは？',
            'correct_answer' => 'php artisan migrate:fresh',
            'hint' => 'データベースを完全に作り直します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで1件目のレコードを取得するメソッドは？',
            'correct_answer' => 'first()',
            'hint' => '最初の結果だけ返します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでレコード数を数えるメソッドは？',
            'correct_answer' => 'count()',
            'hint' => '件数を取得します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで条件に一致する最初のレコードを取得するメソッドは？',
            'correct_answer' => 'firstWhere()',
            'hint' => '条件付きで最初の1件を取得します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで並び替えをするメソッドは？',
            'correct_answer' => 'orderBy()',
            'hint' => 'SQLのORDER BYに対応します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでグループ化をするメソッドは？',
            'correct_answer' => 'groupBy()',
            'hint' => 'SQLのGROUP BYに対応します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで複数のレコードをまとめて挿入するメソッドは？',
            'correct_answer' => 'insert()',
            'hint' => '配列を使って一度にデータを追加します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで1件のレコードを作成して保存するメソッドは？',
            'correct_answer' => 'create()',
            'hint' => 'fillableが設定されている必要があります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでレコードを更新するメソッドは？',
            'correct_answer' => 'update()',
            'hint' => '既存のレコードを変更します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでレコードを削除するメソッドは？',
            'correct_answer' => 'delete()',
            'hint' => 'レコードを1件削除します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでモデルの論理削除に使う機能は？',
            'correct_answer' => 'SoftDeletes',
            'hint' => 'データは残して削除フラグを立てます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで一対多のリレーションを定義するメソッドは？',
            'correct_answer' => 'hasMany',
            'hint' => '親→子の複数関係',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで一対一のリレーションを定義するメソッドは？',
            'correct_answer' => 'hasOne',
            'hint' => '親→子の1対1関係',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで多対多のリレーションを定義するメソッドは？',
            'correct_answer' => 'belongsToMany',
            'hint' => '中間テーブルを利用します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで親モデルに属する関係を定義するメソッドは？',
            'correct_answer' => 'belongsTo',
            'hint' => '子→親のリレーションです',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで全ルートをキャッシュするコマンドは？',
            'correct_answer' => 'php artisan route:cache',
            'hint' => 'ルートをキャッシュして高速化します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでキャッシュをクリアするコマンドは？',
            'correct_answer' => 'php artisan cache:clear',
            'hint' => 'キャッシュデータを削除します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで設定キャッシュを作成するコマンドは？',
            'correct_answer' => 'php artisan config:cache',
            'hint' => '設定ファイルをキャッシュします',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでビューキャッシュを削除するコマンドは？',
            'correct_answer' => 'php artisan view:clear',
            'hint' => 'compiled views を削除します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで認証スカフォールドを提供する軽量パッケージは？',
            'correct_answer' => 'Breeze',
            'hint' => 'Jetstreamよりもシンプル',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでより高機能な認証・チーム機能を持つパッケージは？',
            'correct_answer' => 'Jetstream',
            'hint' => 'InertiaやLivewireと統合されています',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelで公式の管理画面パッケージ（有料）は？',
            'correct_answer' => 'Nova',
            'hint' => 'データ管理UIを提供します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['Laravel'],
            'content' => 'Laravelでインタラクティブなシェルを起動するコマンドは？',
            'correct_answer' => 'php artisan tinker',
            'hint' => '対話形式でモデルを操作できます',
            'difficulty' => 'easy',
        ]);
        
        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}
