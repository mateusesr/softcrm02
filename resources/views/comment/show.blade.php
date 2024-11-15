@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Comentário</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <h5 class="text-lg font-semibold border-b pb-2 mb-4">Comentário #{{ $comment->id }}</h5>
        <p class="mt-2"><strong>Descrição:</strong></p>
        <p class="mt-1 text-gray-700">{{ $comment->description }}</p>
        <p class="mt-4"><strong>ID do Atendimento:</strong> <span class="text-blue-600">{{ $comment->attendance_id }}</span></p>
        <div class="mt-6">
            <a href="{{ route('comment.index', ['attendance_id' => $comment->attendance_id]) }}" class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Voltar</a>
        </div>
    </div>
</div>
@endsection 