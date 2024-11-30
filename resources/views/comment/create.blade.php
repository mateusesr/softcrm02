@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Comentário</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4" style="color: black; font-size: 24px;">Criar Comentário</h2>
        <form class="form-box" action="{{ route('comment.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="attendance_id" class="form-label">Id do Atendimento</label>
                <select class="form-control" id="attendance_id" name="attendance_id" required>
                    @foreach($attendances as $attendance)
                    <option value="{{ $attendance->id }}">
                        {{ $attendance->id }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Descrição</label>
                <textarea rows="3" cols="50" type="text" class="form-control" id="description" name="description"
                    placeholder="Digite a descrição" required></textarea>
            </div>
            <div class="form-group">
                <label for="finish" class="form-label">Finalizar atendimento</label>
                <select class="form-control" id="finish" name="finish" required>
                    <option value="0" selected>Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-save">Enviar</button>
                <br>
                <a href="{{ route('comment.index', ['attendance_id' => $attendance_id]) }}" class="btn btn-secondary btn-cancel">Retornar</a>
            </div>
        </form>
    </div>
</body>
<style>
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
@endsection