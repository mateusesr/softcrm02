@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Atendimento</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4" style="color: black; font-size: 24px;">Criar Atendimento</h2>
        <form class="form-box" action="{{ route('attendance.store') }}" method="POST">
            @if (isset($attendance))
            <div class="alert alert-success sucess" role="alert">
                Atendimento salvo com sucesso!
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="client_id" class="form-label">Cliente</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ isset($client_id) && $client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type_id" class="form-label">Tipo</label>
                <select class="form-control" id="type_id" name="type_id" required>
                    <option value="">Selecione o tipo</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == 1 ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Digite a data" required>
            </div>
            <div class="form-group">
                <label for="time" class="form-label">Hora</label>
                <input type="time" class="form-control" id="time" name="time" placeholder="Digite a hora" required value="{{ old('time', date('H:i', strtotime('-3 hours'))) }}">
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" selected>Pendente</option>
                    <option value="2">Urgente</option>
                    <option value="3">Finalizado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Descrição</label>
                <textarea rows="3" cols="50" type="text" class="form-control" id="description" name="description"
                    placeholder="Digite a descrição" required></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-save">Enviar</button>
                <br>
                <a href="{{ route('attendance.index', ['client_id' => $client_id]) }}"
                    class="btn btn-secondary btn-cancel">Retornar</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('date').value = new Date().toISOString().split('T')[0];
        document.getElementById('time').value = hours + ':' + minutes;
    </script>
</body>
<style>
    .sucess {
        display: flex;
        background-color: green;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 10px 10px;
        border-radius: 6px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    a {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-control {
        padding: 8;
    }

    .form-group {
        padding: 10;
    }

    .form-box {
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 500px;
        box-sizing: border-box;
        margin: 40px auto;

    }

    .btn-save {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 12px 20px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }



    input,
    select,
    textarea {
        margin-bottom: 20px;
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    label {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .table-container .form-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;

    }

    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
        margin: 0;
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
    }

    .btn {
        margin-top: 10px;
        margin: 5px auto;
        padding: 10px 16px;
        border-radius: 5px;
        font-size: 14px;
    }

    .btn-group {
        display: flex;
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
</style>

</html>
@endsection