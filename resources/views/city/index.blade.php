@extends('layouts.app')

@section('content')


<div class="container mx-auto px-4">

    @if (session('message'))
    <div" class="alert alert-success green-box bg-red-500 text-white px-4 py-2 rounded" role="alert">
        {{ session('message') }}
    </div>
@endif

<h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Listagem de Cidades</h2>
<a href="{{ route('city.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova Cidade</a>
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

@endsection

<style>
    .erro{
        color:blue

    }
    h2 {
        font-weight: bold;
        color: #343a40;
        margin-bottom: 20px;
        /* Espaçamento abaixo do título */
    }

    table th,
    table td {
        vertical-align: middle;
        /* Centraliza o conteúdo verticalmente */
        padding: 15px;
        /* Espaçamento interno das células */
        border-bottom: 1px solid #dee2e6;
        /* Linha inferior de borda nas células */
    }

    table th {
        background-color: #007bff;
        /* Cor de fundo para o cabeçalho */
        color: #fff;
        /* Cor do texto no cabeçalho */
    }

    .table {
        width: 100%;
        /* Largura total da tabela */
        max-width: 1000px;
        /* Largura máxima para a tabela */
        margin: 20px auto;
        /* Centraliza a tabela horizontalmente e adiciona margem superior */
        border-radius: 10px;
        /* Arredondamento das bordas */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Sombra suave ao redor da tabela */
        border-collapse: separate;
        /* Para manter o arredondamento das bordas */
        border-spacing: 0;
        /* Remove espaço entre as células da tabela */
    }

    .table td:first-child {
        border-top-left-radius: 10px;
        /* Arredondamento do primeiro cabeçalho e célula */
        border-bottom-left-radius: 10px;
        /* Arredondamento da primeira célula da última linha */
    }

    .table td:last-child {
        border-top-right-radius: 10px;
        /* Arredondamento do último cabeçalho */
        border-bottom-right-radius: 10px;
        /* Arredondamento da última célula da última linha */
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

    .btn-group {
        display: flex;
        /* Os botões ficarão alinhados na horizontal */
        justify-content: center;
        /* Centraliza o grupo de botões */
    }

    /* Sombra e margem adicionais ao redor da tabela */
    .table-container {
        border-radius: 10px;
    }

    /* Estilos dos botões para diferentes ações */
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
</style>