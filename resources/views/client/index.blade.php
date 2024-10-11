@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Listagem de Clientes</h2>
    
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->city_id }}</td>
                    <td>
                        @if($client->is_active)
                            <span class="badge bg-success">Ativo</span>
                        @else
                            <span class="badge bg-danger">Inativo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        <a href="#" class="btn btn-sm btn-secondary">Inativar</a>
                        <a href="#" class="btn btn-sm btn-primary">Criar Atendimento</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
