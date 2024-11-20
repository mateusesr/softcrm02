@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comentário</title>

</head>
@section('content')
<div class="container">
    <h2 class="text-center mb-4" style="color: black; font-size: 24px;">Editar Comentário</h1>
        <form class="form-box" action="{{ route('comment.update', $comment->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="attendance_id" class="block text-sm font-medium text-gray-700">ID do Atendimento</label>
                <input type="number" name="attendance_id" id="attendance_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ $comment->attendance_id }}" required readonly>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>{{ $comment->description }}</textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-save">Enviar</button>
                <br>
                <a href="{{ route('comment.index', ['attendance_id' => $attendance_id]) }}" class="btn btn-secondary btn-cancel">Retornar</a>
            </div>
        </form>
</div>
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
        /* Espaçamento abaixo do título */
    }

    .btn {
        margin-top: 10px;
        margin: 5px 1px;
        /* Espaçamento entre os botões */
        padding: 10px 16px;
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