@extends('master')
@section('content')
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        <p>This is a simple Laravel Blade template.</p>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Visualizar usuários</a>
    </div>
@endsection