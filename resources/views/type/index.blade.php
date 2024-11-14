@extends('layouts.app')

@section('content')
<div class="type-container">
    <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Listagem de Tipos de Atendimentos</h2>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif



    <div class="table-container">
        <div class="d-flex justify-content-center mb-3 table-action">
            <a href="{{ route('type.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Novo Tipo de Atendimento</a>
        </div>
        <table class="table table-bordered table-hover table-striped text-center align-middle"
            style="background-color: white; border-radius: 8px; overflow: hidden;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a title="Editar o Tipo de Atendimento" href="{{ route('type.edit', $type->id) }}" class="btn btn-sm mx-1"><span class="material-symbols-outlined list-icon-edit list-icon">
                                    stylus
                                </span></a>
                            <form action="{{ route('type.destroy', $type->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button title="Excluir o Tipo de Atendimento" type="submit" class="btn btn-sm mx-1" onclick="return confirm('Tem certeza que deseja excluir este tipo?');"><span class="material-symbols-outlined list-icon-delete list-icon">
                                        delete
                                    </span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .table-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .table-action {
        width: 100%;
        max-width: 1000px;
    }
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

    .table {
        width: 100%;
        max-width: 1000px;
        margin: 20px auto;
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

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }
</style>
@endsection