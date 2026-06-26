@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('header')
    <h1 class="h1">Novo Usuário</h1>
    <p class="text-muted">Preencha os dados para cadastrar.</p>
@endsection

@section('content')
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <form action="{{ route('users.store') }}" method="POST" class="form">
        @csrf

        <div class="field">
            <label for="name">Nome</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Ex: Gabriel Alvarez"
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
                value="{{ old('email') }}"
                placeholder="Ex: gabriel@exemplo.com"
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
                value="{{ old('age') }}"
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
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
@endsection




