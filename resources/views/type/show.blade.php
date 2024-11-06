@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Tipo</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <h5 class="text-lg font-semibold">Tipo #{{ $type->id }}</h5>
        <p class="mt-2"><strong>Nome:</strong> {{ $type->name }}</p>
        <a href="{{ route('type.index') }}" class="mt-4 inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400" style="
            display: flex;
            align-items: center;
            width: 100px;
            justify-content: center;
        "><span class="material-symbols-outlined list-icon-back">
                undo
            </span> Voltar</a>
    </div>
</div>
@endsection

<style>
    .list-icon-back {
        font-weight: bold !important;
        font-size: 2em !important;
    }
</style>