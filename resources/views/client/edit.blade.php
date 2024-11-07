@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        .btn {
            margin-top: 10px;
            /* Espaçamento entre os botões */
        }
    </style>
</head>
<div class="container">
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