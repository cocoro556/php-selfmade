<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class SqlQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // SQLの問題
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで全てのデータを取得するコマンドは？',
            'correct_answer' => 'SELECT * FROM',
            'hint' => '全カラムを指定するときに*を使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで新しいレコードを挿入するコマンドは？',
            'correct_answer' => 'INSERT INTO',
            'hint' => 'データを追加するときに使います',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでレコードを更新するコマンドは？',
            'correct_answer' => 'UPDATE',
            'hint' => '既存のデータを変更します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでレコードを削除するコマンドは？',
            'correct_answer' => 'DELETE FROM',
            'hint' => 'データを削除するときに使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで条件を指定するキーワードは？',
            'correct_answer' => 'WHERE',
            'hint' => '特定の条件でデータを絞り込みます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでデータを並び替えるキーワードは？',
            'correct_answer' => 'ORDER BY',
            'hint' => '昇順や降順で並べ替えます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでデータをグループ化するキーワードは？',
            'correct_answer' => 'GROUP BY',
            'hint' => '同じ値でまとめて集計します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで複数のテーブルを結合するキーワードは？',
            'correct_answer' => 'JOIN',
            'hint' => 'テーブル同士を関連付けます',
            'difficulty' => 'medium',
        ]);

        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで新しいテーブルを作成するコマンドは？',
            'correct_answer' => 'CREATE TABLE',
            'hint' => 'テーブル構造を定義します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでテーブルを削除するコマンドは？',
            'correct_answer' => 'DROP TABLE',
            'hint' => 'テーブル全体を削除します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでテーブル構造を変更するコマンドは？',
            'correct_answer' => 'ALTER TABLE',
            'hint' => 'カラムの追加や削除に使います',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで重複を除いてデータを取得するキーワードは？',
            'correct_answer' => 'DISTINCT',
            'hint' => '同じ値は1つだけ表示します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで取得件数を制限するキーワードは？',
            'correct_answer' => 'LIMIT',
            'hint' => '上位N件だけ取得します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで文字列の一部を検索するキーワードは？',
            'correct_answer' => 'LIKE',
            'hint' => 'ワイルドカード%と組み合わせます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで複数の値のいずれかに一致するかチェックするキーワードは？',
            'correct_answer' => 'IN',
            'hint' => '配列のような値リストで条件指定します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで範囲を指定するキーワードは？',
            'correct_answer' => 'BETWEEN',
            'hint' => '最小値と最大値の間を指定します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでNULL値をチェックするキーワードは？',
            'correct_answer' => 'IS NULL',
            'hint' => '空の値を検索します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで件数を数える関数は？',
            'correct_answer' => 'COUNT()',
            'hint' => 'レコード数を取得します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで合計を計算する関数は？',
            'correct_answer' => 'SUM()',
            'hint' => '数値カラムの合計を求めます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで平均値を計算する関数は？',
            'correct_answer' => 'AVG()',
            'hint' => '数値の平均を求めます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで最大値を取得する関数は？',
            'correct_answer' => 'MAX()',
            'hint' => '一番大きい値を取得します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで最小値を取得する関数は？',
            'correct_answer' => 'MIN()',
            'hint' => '一番小さい値を取得します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで昇順に並び替えるキーワードは？',
            'correct_answer' => 'ASC',
            'hint' => '小さい順から大きい順です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで降順に並び替えるキーワードは？',
            'correct_answer' => 'DESC',
            'hint' => '大きい順から小さい順です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで内部結合を行うキーワードは？',
            'correct_answer' => 'INNER JOIN',
            'hint' => '両方のテーブルに存在するデータのみ取得',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで左外部結合を行うキーワードは？',
            'correct_answer' => 'LEFT JOIN',
            'hint' => '左のテーブルの全データを取得',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで右外部結合を行うキーワードは？',
            'correct_answer' => 'RIGHT JOIN',
            'hint' => '右のテーブルの全データを取得',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでサブクエリの結果が存在するかチェックするキーワードは？',
            'correct_answer' => 'EXISTS',
            'hint' => 'サブクエリに結果があるか確認します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLでユニオン（和集合）を作るキーワードは？',
            'correct_answer' => 'UNION',
            'hint' => '複数のSELECT結果を結合します',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで主キーを設定するキーワードは？',
            'correct_answer' => 'PRIMARY KEY',
            'hint' => 'テーブルの一意識別子です',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['SQL'],
            'content' => 'SQLで外部キーを設定するキーワードは？',
            'correct_answer' => 'FOREIGN KEY',
            'hint' => '他のテーブルとの関連を設定します',
            'difficulty' => 'medium',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}