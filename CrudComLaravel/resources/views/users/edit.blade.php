@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('header')
    <h1 class="h1">Editar Usuário</h1>
    <p class="text-muted">Ajuste os dados e atualize.</p>
@endsection

@section('content')
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <form action="{{ route('users.update', $user) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name">Nome</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                placeholder="Ex: Severino Santana"
                required
                autofocus
                class="form-control"
            />
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                placeholder="Ex: severino@exemplo.com"
                required
                class="form-control"
            />
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="age">Idade</label>
            <input
                type="number"
                id="age"
                name="age"
                value="{{ old('age', $user->age) }}"
                placeholder="Ex: 28"
                min="0"
                max="120"
                required
                class="form-control"
            />
            @error('age')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="actions mb-2">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
@endsection




