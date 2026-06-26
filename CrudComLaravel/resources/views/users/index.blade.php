@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('header')
    <h1 class="h1">Gestão de Usuários</h1>
    <p class="text-muted">Cadastro, edição e remoção.</p>
@endsection

@section('content')
    <div class="d-flex justify-between align-center mb-3">
        <h2 class="h2">Registros salvos</h2>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            Novo usuário
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }} anos</td>
                    <td class="actions">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary">Editar</a>

                        <form
                            action="{{ route('users.destroy', $user) }}"
                            method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')"
                            class="inline"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhum usuário cadastrado no momento.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($users->hasPages())
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    @endif
@endsection




