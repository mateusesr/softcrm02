@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Comentário</title>
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

        .form-box {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="form-box">
            @if (isset($comment))
            <div class="alert alert-success" role="alert">
                Comentário salvo com sucesso!
            </div>
            @endif

            <h2 class="text-center mb-4">Criar Comentário</h2>
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="attendance_id" class="form-label">Id do Atendimento</label>
                    <select class="form-control" id="attendance_id" name="attendance_id" required>
                    @foreach($attendances as $attendance)
                        <option value="{{ $attendance->id }}"> 
                        {{ $attendance->id }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="Digite a descrição" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <br>
                    <a href="{{ route('comment.index', ['attendance_id' => $attendance_id]) }}" class="btn btn-primary">Retornar</a>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection