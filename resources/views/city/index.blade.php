@extends('layouts.app')

@section('content')

<div class="main">
    <div class="city-container" id="city-container">
        @if (session('message'))
        <div class="alert alert-success green-box bg-red-500 text-white px-4 py-2 rounded erro" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Cidades</h2>

        <form class="form-box" action="{{ route('city.search') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="text-center mb-6">
                    <input type="text" name="query" class="form-control" placeholder="Pesquisar Cidades..."
                        value="{{ request('query') }}">
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary w-100 btn-search">Pesquisar</button>
                </div>
            </div>
        </form>

        <div class="table-container">
            <div class="table-action">
                <a href="{{ route('city.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova Cidade</a>
            </div>
            <table class="table table-bordered table-hover table-striped text-center align-middle"
                style="background-color: white; border-radius: 8px; overflow: hidden;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>UF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->uf }}</td>
                        <td>
                            <div>
                                <a title="Editar Cidade" href="{{ route('city.edit', $city->id) }}"
                                    class="text-yellow-500 hover:underline" class="btn btn-sm mx-1"><span
                                        class="material-symbols-outlined list-icon-edit list-icon">
                                        stylus
                                    </span></a>
                                <form action="{{ route('city.destroy', $city->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Excluir Cidade" type="submit"
                                        class="text-red-500 hover:underline, btn btn-sm mx-1"
                                        onclick="return confirm('Tem certeza que deseja excluir esta cidade?');"><span
                                            class="material-symbols-outlined list-icon-delete list-icon">
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
</div>
@endsection

<style>
    .erro {
        display: flex;
        justify-content: center;
        background-color: green;
        align-items: center;
        color: white;
        padding: 10px 10px;
        border-radius: 6px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .main {
        display: flex;
        justify-content: center;
    }

    .city-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        max-width: 1000px;
    }

    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .form-select {
        width: 250px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 25px;
        font-size: 16px;
        outline: none;
    }

    .btn-search:focus {
        outline: none;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .row {
        display: flex;
        align-items: baseline;
        gap: 5px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .form-control {
        width: 250px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        outline: none;
    }

    .no-print {
        margin: 0 5px;
    }

    .table-action {
        display: flex;
        justify-content: space-between;
        margin: 0 20px;
    }

    .imprimir .btn {
        display: none;
    }

    .imprimir th:last-child {
        display: none;
    }

    .imprimir .table-action {
        display: none;
    }


    h2 {
        font-weight: bold;
        color: #343a40;
        margin-bottom: 20px;
    }

    table th,
    table td {
        vertical-align: middle;
        padding: 15px 10px;
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
        margin: 0 8px;
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
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        align-content: center;
        justify-content: center;
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
</style>