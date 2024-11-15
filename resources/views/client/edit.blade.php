@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <!-- Bootstrap CSS -->
    
</head>
<div class="table-container">
    <h1>Editar Cliente</h1>
    <form action="{{ route('client.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ $client->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $client->email }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" value="{{ $client->phone }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city_id">Cidade</label>
            <select name="city_id" id="city_id" class="form-control" required>
                <!-- Supondo que você tenha uma lista de cidades -->
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ $client->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

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

    .table-action .btn {
        margin: 0;
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