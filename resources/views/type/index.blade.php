@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Tipos</h1>
    <a href="{{ route('type.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Novo Tipo</a>
    <table class="min-w-full bg-white border border-gray-300 mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ $type->id }}</td>
                <td class="py-2 px-4 border-b">{{ $type->name }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('type.show', $type->id) }}" class="text-blue-500 hover:underline">Ver</a>
                    <a href="{{ route('type.edit', $type->id) }}" class="text-yellow-500 hover:underline">Editar</a>
                    <form action="{{ route('type.destroy', $type->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este tipo?');">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 