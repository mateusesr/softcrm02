@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Listagem de Comentários</h2>
    <h4 class="text-center mb-4" style="color: gray; font-size: 15px;">Comentários para o Atendimento ID:
        {{ request()->get('attendance_id') }}
    </h4>
    <a href="{{ route('comment.create', ['attendance_id' => $attendance_id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Novo Comentário</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->description }}</td>
                <td>
                    <a title="Ver Comentário" href="{{ route('comment.show', $comment->id) }}" class="btn "><span class="material-symbols-outlined list-icon">
                            folder_eye
                        </span></a>
                    <a title="Editar" href="{{ route('comment.edit', $comment->id) }}" class="btn"><span class="material-symbols-outlined list-icon-edit list-icon">
                            stylus
                        </span></a>
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button title="Excluir" type="submit" class="btn" onclick="return confirm('Tem certeza que deseja excluir este comentário?');"><span class="material-symbols-outlined list-icon-delete list-icon">
                                delete
                            </span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    h2 {
        font-weight: bold;
        color: #343a40;
        margin-bottom: 20px;
        /* Espaçamento abaixo do título */
    }

    table th,
    table td {
        vertical-align: middle;
        /* Centraliza o conteúdo verticalmente */
        padding: 15px;
        /* Espaçamento interno das células */
        border-bottom: 1px solid #dee2e6;
        /* Linha inferior de borda nas células */
        text-align: center;
    }

    table th {
        background-color: #007bff;
        /* Cor de fundo para o cabeçalho */
        color: #fff;
        /* Cor do texto no cabeçalho */
    }

    .table {
        width: 100%;
        /* Largura total da tabela */
        max-width: 1000px;
        /* Largura máxima para a tabela */
        margin: 20px auto;
        /* Centraliza a tabela horizontalmente e adiciona margem superior */
        border-radius: 10px;
        /* Arredondamento das bordas */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Sombra suave ao redor da tabela */
        border-collapse: separate;
        /* Para manter o arredondamento das bordas */
        border-spacing: 0;
        /* Remove espaço entre as células da tabela */
    }

    .table td:first-child {
        border-top-left-radius: 10px;
        /* Arredondamento do primeiro cabeçalho e célula */
        border-bottom-left-radius: 10px;
        /* Arredondamento da primeira célula da última linha */
    }

    .table td:last-child {
        border-top-right-radius: 10px;
        /* Arredondamento do último cabeçalho */
        border-bottom-right-radius: 10px;
        /* Arredondamento da última célula da última linha */

    }

    th:last-child {
        border-radius: 0 5px 0 0;
    }

    th:first-child {
        border-radius: 5px 0 0 0;
    }

    .btn {
        margin: 0 5px;
        /* Espaçamento entre os botões */
        padding: 8px 16px;
        /* Aumenta o espaçamento interno dos botões */
        border-radius: 5px;
        /* Arredondamento dos botões */
        font-size: 14px;
        /* Tamanho da fonte dos botões */
    }

    .btn-group {
        display: flex;
        /* Os botões ficarão alinhados na horizontal */
        justify-content: center;
        /* Centraliza o grupo de botões */
    }

    /* Sombra e margem adicionais ao redor da tabela */
    .table-container {
        border-radius: 10px;
    }

    /* Estilos dos botões para diferentes ações */
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
</style>


@endsection