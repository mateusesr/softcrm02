@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-1/2 max-w-sm px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h1 class="text-center text-xl font-bold mb-4">Editar Perfil</h1>

        @if (session('status'))
            <div class="alert alert-success green-box" role="alert">
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
 .green-box{
    border:2px #00800080 solid;
    border-radius:0.5em;
    background-color: #00800080;
    padding: 3px;
    text-align: center;
 }
</style>
