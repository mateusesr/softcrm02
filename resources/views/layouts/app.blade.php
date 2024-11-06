<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Aplicativo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between">
            <div class="flex space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Dashboard</a>
                <a href="{{ route('client.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Clientes</a>
                <a href="{{ route('attendance.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Atendimentos</a>
                <a href="{{ route('type.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Tipos de Atendimentos</a>
                <a href="{{ route('city.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Cidades</a>
            </div>
            <div class="flex space-x-4">
                @auth
                <a href="{{ route('profile.edit') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Perfil</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:bg-gray-700 px-3 py-2 rounded">Logout</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-4">
        @yield('content')
    </main>
    <style>
        .list-icon {
            font-weight: bold !important;
            font-size: 2em !important;
        }

        .list-icon-delete {
            color: red
        }

        .list-icon-edit {
            color: #007bff
        }

        .list-icon-add {
            color: #4da94d
        }

        table td div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table td div form {
            display: flex;
            margin: 0;
        }
    </style>
</body>

</html>