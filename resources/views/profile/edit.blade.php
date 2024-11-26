@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-1/2 max-w-sm px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg " style="max-width: max-content;">
        <h1 class="text-center text-xl font-bold mb-4">Editar Perfil</h1>

        @if (session('status'))
            <div class="alert alert-success green-box sucess" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
        </form>
    </div>
</div>
@endsection

<style>
    .sucess {
        display: flex;
        background-color: green;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 10px 10px;
        border-radius: 6px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        margin: 0 30px;
    }
  .perfil{
    max-width: max-content;
  }
</style>
