@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes da Cidade</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <h5 class="text-lg font-semibold">Cidade #{{ $city->id }}</h5>
        <p class="mt-2"><strong>Nome:</strong> {{ $city->name }}</p>
        <a href="{{ route('city.index') }}" class="mt-4 inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Voltar</a>
    </div>
</div>
@endsection 