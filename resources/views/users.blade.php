@extends('master')
@section('content')
    <div class="container">
        <h1>Lista de Usuários</h1>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->firstName }} {{ $user->lastName }}</li>
            @endforeach
        </ul>
    </div>
@endsection