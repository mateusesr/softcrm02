@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-1/2 max-w-sm px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h1 class="text-center text-xl font-bold mb-4">Editar Perfil</h1>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" class="form-input mt-1 block w-full" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="form-input mt-1 block w-full" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="flex items-center justify-end mt-3">
                <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
