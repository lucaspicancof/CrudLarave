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
        <form class="form-control bg-dark text-light" action="{{ route('users.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="firstName" class="form-label">Primeiro Nome</label>
                <input type="text" name="firstName" class="form-control " required pattern="[A-Za-zÀ-ÿ\s]+" placeholder="Ex: João" >
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Sobrenome</label>
                <input type="text" name="lastName" class="form-control" placeholder="Ex: Silva" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required placeholder="email@exemplo.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" required minlength="8" placeholder="********" >
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
