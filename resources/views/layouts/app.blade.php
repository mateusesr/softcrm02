<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftCRM</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
    <header>
    <nav class="bg-gray-800 p-4 header-navbar" id="navbar">
        <div class="container mx-auto flex justify-between header">
            <div class="flex space-x-4 navbar-left">
                <a href="{{ route('dashboard') }}" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Dashboard</a>
                <a href="{{ route('client.index') }}" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Clientes</a>
                <a href="{{ route('attendance.index') }}" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Atendimentos</a>
                <a href="{{ route('type.index') }}" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Tipos de Atendimentos</a>
                <a href="{{ route('city.index') }}" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Cidades</a>
            </div>
            <div class="flex space-x-4 profile navbar-right">
                @auth
                <a href="{{ route('profile.edit') }}" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Perfil</a>
                <form class="form-out" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:bg-gray-700 px-8 py-2 rounded">Logout</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>
    </header>

    <main class="container mx-auto mt-4">
        @yield('content')
    </main>
    <style>
        .header {
            width: 100%;
            height: 40px;
        }
        
        .header-navbar {
            text-decoration: none;
        }

        .btn-cancel:hover {
            background-color: #494f55;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

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

        .list-icon:hover {
            color: #fff;
            background-color: #002557;
            Border-radius: 3px
        }

        .list-icon-edit:hover {
            color: #fff;
            background-color: #3498db;
        }

        .list-icon-add:hover {
            color: #fff;
            background-color: #2ecc71;
        }

        .list-icon-delete:hover {
            color: #fff;
            background-color: #e74c3c;
        }

        .list-icon-check:after {
            content: 'check_circle';
        }

        .list-icon-check:hover::after {
            content: 'cancel';
            background-color: #e74c3c;
            Border-radius: 3px
        }

        .list-icon-cancel:after {
            content: 'cancel';
        }

        .list-icon-cancel:hover::after {
            content: 'check_circle';
            background-color: #2ecc71;
            Border-radius: 3px
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


</html>