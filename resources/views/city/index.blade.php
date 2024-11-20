@extends('layouts.app')

@section('content')


<div class="container">

    @if (session('message'))
    <div class="alert alert-success green-box bg-red-500 text-white px-4 py-2 rounded" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Cidades</h2>

    <form action="{{ route('city.search') }}" method="GET" class="mb-4">
    <div class="row">
      <div class="text-center mb-6">
        <input type="text" name="query" class="form-control" placeholder="Pesquisar Cidades..."
          value="{{ request('query') }}">
      </div>
      <div class="text-center mb-3">
        <button type="submit" class="btn btn-primary w-100 btn-query">Pesquisar</button>
      </div>
    </div>
  </form>

    <div class="table-container">
        <div class="table-action">
            <a href="{{ route('city.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova Cidade</a>
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
                            <a title="Editar Cidade" href="{{ route('city.edit', $city->id) }}" class="text-yellow-500 hover:underline"
                                class="btn btn-sm mx-1"><span class="material-symbols-outlined list-icon-edit list-icon">
                                    stylus
                                </span></a>
                            <form action="{{ route('city.destroy', $city->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button title="Excluir Cidade" type="submit" class="text-red-500 hover:underline, btn btn-sm mx-1" onclick="return confirm('Tem certeza que deseja excluir esta cidade?');"><span class="material-symbols-outlined list-icon-delete list-icon">
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

@endsection

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
        /* Espaçamento entre os botões */
        padding: 8px 16px;
        /* Aumenta o espaçamento interno dos botões */
        border-radius: 5px;
        /* Arredondamento dos botões */
        font-size: 14px;
        /* Tamanho da fonte dos botões */
    }
</style>