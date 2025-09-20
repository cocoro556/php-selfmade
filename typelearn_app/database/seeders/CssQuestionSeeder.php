<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;

class CssQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->all();

        // CSSの問題
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでテキストの色を指定するプロパティは？',
            'correct_answer' => 'color',
            'hint' => '文字の色を設定します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで背景色を指定するプロパティは？',
            'correct_answer' => 'background-color',
            'hint' => '要素の背景色を設定します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでフォントサイズを指定するプロパティは？',
            'correct_answer' => 'font-size',
            'hint' => '文字の大きさを設定します',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の幅を指定するプロパティは？',
            'correct_answer' => 'width',
            'hint' => '横幅を設定します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の高さを指定するプロパティは？',
            'correct_answer' => 'height',
            'hint' => '縦幅を設定します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでテキストを中央揃えにするプロパティは？',
            'correct_answer' => 'text-align',
            'hint' => 'centerを値に設定します',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の外側の余白を指定するプロパティは？',
            'correct_answer' => 'margin',
            'hint' => '要素の外側のスペースです',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の内側の余白を指定するプロパティは？',
            'correct_answer' => 'padding',
            'hint' => '要素の内側のスペースです',
            'difficulty' => 'easy',
        ]);

        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の境界線を指定するプロパティは？',
            'correct_answer' => 'border',
            'hint' => '要素の周りに線を引きます',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の表示方法を指定するプロパティは？',
            'correct_answer' => 'display',
            'hint' => 'block, inline, noneなどを指定します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素を非表示にするdisplayの値は？',
            'correct_answer' => 'none',
            'hint' => '完全に見えなくなります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素をブロック要素にするdisplayの値は？',
            'correct_answer' => 'block',
            'hint' => '縦に並ぶ要素になります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素をインライン要素にするdisplayの値は？',
            'correct_answer' => 'inline',
            'hint' => '横に並ぶ要素になります',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の位置を指定するプロパティは？',
            'correct_answer' => 'position',
            'hint' => 'static, relative, absolute, fixedなどがあります',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素を浮動させるプロパティは？',
            'correct_answer' => 'float',
            'hint' => 'left, rightで左右に寄せます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の重なり順序を指定するプロパティは？',
            'correct_answer' => 'z-index',
            'hint' => '数値が大きいほど前面に表示されます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の透明度を指定するプロパティは？',
            'correct_answer' => 'opacity',
            'hint' => '0から1の値で透明度を設定します',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでフレックスボックスを使うdisplayの値は？',
            'correct_answer' => 'flex',
            'hint' => '柔軟なレイアウトを作れます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでグリッドレイアウトを使うdisplayの値は？',
            'correct_answer' => 'grid',
            'hint' => '格子状のレイアウトを作れます',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでホバー時のスタイルを指定する疑似クラスは？',
            'correct_answer' => ':hover',
            'hint' => 'マウスを乗せたときの状態です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでクリック時のスタイルを指定する疑似クラスは？',
            'correct_answer' => ':active',
            'hint' => 'ボタンを押している間の状態です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでフォーカス時のスタイルを指定する疑似クラスは？',
            'correct_answer' => ':focus',
            'hint' => '入力欄が選択されている状態です',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでクラスセレクターを指定する記号は？',
            'correct_answer' => '.',
            'hint' => 'ドット記号を使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでIDセレクターを指定する記号は？',
            'correct_answer' => '#',
            'hint' => 'ハッシュ記号を使います',
            'difficulty' => 'easy',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素に影をつけるプロパティは？',
            'correct_answer' => 'box-shadow',
            'hint' => '立体的な効果を作れます',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで要素の角を丸くするプロパティは？',
            'correct_answer' => 'border-radius',
            'hint' => '角丸の効果を作れます',
            'difficulty' => 'medium',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSでアニメーションを作るプロパティは？',
            'correct_answer' => 'animation',
            'hint' => 'keyframesと組み合わせて使います',
            'difficulty' => 'hard',
        ]);
        
        Question::create([
            'category_id' => $categories['CSS'],
            'content' => 'CSSで変化にかかる時間を指定するプロパティは？',
            'correct_answer' => 'transition',
            'hint' => 'スムーズな変化を作れます',
            'difficulty' => 'hard',
        ]);

        \App\Models\Question::whereNull('user_id')->update(['is_template' => true]);
    }
}