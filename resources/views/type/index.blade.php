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

<style>
  h2 {
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
  }

  table th,
  table td {
    vertical-align: middle;
    padding: 15px;
    border-bottom: 1px solid #dee2e6;
  }

  table th {
    background-color: #007bff;
    color: #fff;
  }


  .client-container {
    max-width: max-content;
    margin: 0 auto;
  }

  .margin-left {
    margin-left: 15px !important;
  }

  .table {
    width: 100%;
    max-width: 1000px;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-collapse: separate;
    border-spacing: 0;
  }

  .table td:first-child {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
  }

  .table td:last-child {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
  }

  .btn {
    margin: 0 5px;
    padding: 8px 16px;
    border-radius: 5px;
    font-size: 14px;
  }

  .btn-group {
    display: flex;
    justify-content: center;
  }

  .table-container {
    border-radius: 10px;
  }

  .btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
  }

  .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
  }

  .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
  }

  .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    color: white;
  }

  /* Estilo para o botão Reativar */
</style>
@endsection 