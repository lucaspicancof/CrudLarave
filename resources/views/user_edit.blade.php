@extends('master')

@section('content')
    <div class="container mt-4">

        {{-- Título da página --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Editar Usuário</h1>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar para Home</a>
        </div>

        {{-- Mensagem de retorno --}}
        @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session()->get('message') }}
            </div>
        @endif

        {{-- Formulário de edição --}}
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="firstName" class="form-label">Primeiro Nome</label>
                <input type="text" name="firstName" id="firstName" class="form-control" value="{{ $user->firstName }}" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Sobrenome</label>
                <input type="text" name="lastName" id="lastName" class="form-control" value="{{ $user->lastName }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
@endsection
