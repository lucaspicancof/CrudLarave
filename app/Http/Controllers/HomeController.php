<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function store(Request $request){
        
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        $autenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($autenticated){
            return redirect()->route('users.index')->with('message', 'Login realizado com sucesso!');
        }
        else{
            $user = User::where('email', $request->email)->first();
            if (!$user){
                return redirect()->route('home')->with('message', 'ERRO: Este email não está cadastrado.');
            }

            if (!password_verify($request->password, $user->password)){
                return redirect()->route('home')->with('message', 'ERRO: Senha incorreta.');
            }
            
            //return redirect()->route('home')->with('message', 'ERRO: Login não realizado!');
        }
        
        
        
        
        
        //return redirect()->route('users.index');
    }
}
