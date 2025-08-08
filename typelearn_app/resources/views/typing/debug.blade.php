@extends('layouts.guest')
@section('title', 'デバッグ情報')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-2xl font-bold mb-4">デバッグ情報</h1>
    
    <div class="bg-gray-800 p-4 rounded-lg text-white max-w-2xl">
        <h2 class="text-xl mb-2">リクエスト情報</h2>
        <p>要求された難易度: {{ $debugInfo['requested_difficulty'] }}</p>
        <p>変換後の難易度: {{ $debugInfo['mapped_difficulty'] }}</p>
        
        <h2 class="text-xl mt-4 mb-2">利用可能な問題</h2>
        @foreach($debugInfo['available_questions'] as $question)
            <div class="border-b border-gray-600 py-2">
                <p><strong>ID:</strong> {{ $question['id'] }}</p>
                <p><strong>問題:</strong> {{ $question['question_text'] }}</p>
                <p><strong>難易度:</strong> {{ $question['difficulty'] }}</p>
            </div>
        @endforeach
    </div>
    
    <div class="mt-4">
        <a href="{{ route('typing.select-difficulty', ['category' => request()->query('category')]) }}" 
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            難易度選択に戻る
        </a>
    </div>
</div>
@endsection
