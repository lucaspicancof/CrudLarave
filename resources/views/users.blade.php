@extends('master')

@section('content')
    <div class="container mt-4">

        {{-- Mensagem de retorno (ex: sucesso ao cadastrar) --}}
        @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session()->get('message') }}
            </div>
        @endif

        {{-- Botão de cadastrar novo usuário --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de Usuários</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Cadastrar Novo Usuário</a>
        </div>

        {{-- Lista de usuários estilizada --}}
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $user->firstName }} {{ $user->lastName }}</strong><br>
                        <small>{{ $user->email }}</small>
                    </div>
                    <div class="d-flex gap-2">
                        {{-- Editar (ícone de lápis) --}}
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- Excluir (ícone de lixeira) --}}
                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
