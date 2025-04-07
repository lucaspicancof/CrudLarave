@extends('master')

@section('content')
    <div class="container mt-4">

        {{-- Mensagem de sucesso/erro --}}
        @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session()->get('message') }}
            </div>
        @endif

        <h1 class="mb-4">Cadastrar Novo Usuário</h1>

        {{-- Formulário estilizado --}}
        <form action="{{ route('users.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="firstName" class="form-label">Primeiro Nome</label>
                <input type="text" name="firstName" class="form-control" placeholder="Ex: João" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Sobrenome</label>
                <input type="text" name="lastName" class="form-control" placeholder="Ex: Silva" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" placeholder="********" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar para Home</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
