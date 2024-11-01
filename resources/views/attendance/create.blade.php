<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Atendimento</title>
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
            @if (isset($attendance))
                <div class="alert alert-success" role="alert">
                    Atendimento salvo com sucesso!
                </div>
            @endif

            <h2 class="text-center mb-4">Criar Atendimento</h2>
            <form action="/attendance" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="client_id" class="form-label">Cliente</label>
                    <input type="number" class="form-control" id="client_id" name="client_id"
                        placeholder="Digite o ID do cliente" required>
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo</label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        <option value="">Selecione o tipo</option>
                        <option value="1">Presencial</option>
                        <option value="2">Remoto</option>
                        <option value="3">Hibrido</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Data</label>
                    <input type="date" class="form-control" id="date" name="date"
                        placeholder="Digite a data" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select type="text" class="form-control" id="status" name="status">
                        <option value="">Selecione o Status</option>
                        <option value="1">Ativo</option>
                        <option value="2">Em Espera</option>
                        <option value="3">Finalizado</option>
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
                    <a href="{{ route('attendance.index') }}" class="btn btn-primary">Retornar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
