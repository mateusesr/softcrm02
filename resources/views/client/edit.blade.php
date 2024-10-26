<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Form</title>
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
            @if (isset($message))
            <div class="alert alert-success" role="alert">
                Cliente salvo com sucesso!
            </div>
            @endif

            <h2 class="text-center mb-4">Editar Cliente</h2>
            <form action='{{ "/client/$client->id" }}' method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input value='{{ $client->name }}' type="text" class="form-control" id="name" name="name"
                        placeholder="Digite seu nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value='{{ $client->email }}' type="email" class="form-control" id="email"
                        name="email" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input value='{{ $client->phone }}' type="tel" class="form-control" id="phone"
                        name="phone" placeholder="Digite seu numero de telefone" required>
                </div>
                <div class="mb-3">
                    <label for="city_id" class="form-label">Cidade</label>
                    <select class="form-control" id="city_id" name="city_id" required>
                        <option value="" disabled selected>Escolha a sua cidade</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->uf }} - {{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <br>
                    <a href="{{ route('client.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
