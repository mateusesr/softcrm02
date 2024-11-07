<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atendimento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Editar Atendimento</h2>
        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="client_id" class="form-label">Cliente</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $attendance->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo</label>
                <select class="form-control" id="type_id" name="type_id" required>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $attendance->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $attendance->date }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $attendance->status == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="2" {{ $attendance->status == 2 ? 'selected' : '' }}>Em Espera</option>
                    <option value="3" {{ $attendance->status == 3 ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $attendance->description }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('attendance.index', ['client_id' => $attendance->client_id]) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>