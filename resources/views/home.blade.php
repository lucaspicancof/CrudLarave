@extends('master')

@section('styles')
    <style>
        body {
            background: url('/back_CRUD.gif') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
@endsection



@section('content')



   
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card bg-dark text-light p-4 shadow" style="width: 100%; max-width: 400px;">

            <h1 class="mb-4 text-center">Login</h1>

            @if(session()->has('message'))
                <div id="message" class="alert alert-info">
                    {{ session()->get('message') }}
                </div>
                <script>
                    setTimeout(() => {
                        const msg = document.getElementById('message');
                        if (msg) {
                            msg.style.display = 'none';
                        }
                    }, 8000); 
                </script>
            @endif

            <form action="{{ route('home.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" value="fabio@email.com" required placeholder="email@exemplo.com">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" value="123456789" required minlength="8" placeholder="********" >
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Logar</button>
                </div>
            </form>

        </div>
    </div>
@endsection


{{-- <a href="{{ route('users.index') }}" class="btn btn-secondary">Visualizar usuários</a> --}}