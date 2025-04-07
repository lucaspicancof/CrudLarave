@extends('master')
@section('content')
    <div class="container">
        <h1>Dados do Usuário</h1>

        <p><strong>Nome:</strong> {{ $user->firstName }} {{ $user->lastName }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>                                                                



    </div>
<a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Voltar para Home</a>


@endsection