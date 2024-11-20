<!DOCTYPE html>
<html lang="pt-BR">

<head>

<body>
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
</body>
</head>
<style>
    .navbar-left,
    .navbar-right {
        display: flex;
        gap: 15px;
        /* Espaçamento entre os itens */
    }

    .header {
        width: 1280px;
        height: 40px;
    }

    .header-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #1a1e29;
        text-decoration: none;
    }
</style>

</html>