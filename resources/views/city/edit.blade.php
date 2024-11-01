@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Editar Cidade</h1>
    <form action="{{ route('city.update', $city->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" id="name" value="{{ $city->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="uf" class="block text-sm font-medium text-gray-700">UF</label>
            <input type="text" name="uf" id="uf" value="{{ $city->uf }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required maxlength="2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Atualizar</button>
    </form>
</div>
@endsection 