<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importando o modelo User

class UserController extends Controller
{

    public readonly User $user;
    public function  __construct(){
        $this->user = new User();
    }  /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = strtolower($request->input('search'));
        if ($search) {
        $terms = explode(' ', $search);
        $query = $this->user->query();

        foreach ($terms as $term) {
            $term = trim($term);
            if (!empty($term)) {
                $query->where(function ($q) use ($term) {
                    $q->whereRaw('LOWER(firstName) LIKE ?', ["%{$term}%"])
                      ->orWhereRaw('LOWER(lastName) LIKE ?', ["%{$term}%"]);
                });
            }
        }

        // Adiciona uma ordenação baseada na relevância
        $firstTerm = trim($terms[0]); // usamos o primeiro termo como principal
        $query->orderByRaw("
            CASE
                WHEN LOWER(firstName) LIKE ? THEN 1
                WHEN LOWER(lastName) LIKE ? THEN 2
                WHEN LOWER(firstName) LIKE ? THEN 3
                WHEN LOWER(lastName) LIKE ? THEN 4
                ELSE 5
            END
        ", [
            "{$firstTerm}%", // começa com
            "{$firstTerm}%", // começa com
            "%{$firstTerm}%", // contém
            "%{$firstTerm}%"
        ]);

        $users = $query->get();
        } else {
            $users = $this->user->all();
        }
        
    
        return view('users', ['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->user->create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => password_hash ($request->input('password'), PASSWORD_DEFAULT)
        ]);
        if($created){
                return redirect()->route('users.index')->with('message', 'Usuário cadastrado com sucesso!');
        }
            return redirect()->route('users.index')->with('message', 'ERRO: Usuário não cadastrado!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id', $id)->update($request->except(['_token','_method']));
        if($updated){
            return redirect()->back()->with('message', 'Usuário atualizado com sucesso!');
        }
        return redirect()->back()->with('message', 'ERRO: Usuário não atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user && $user->delete()) {
            return redirect()->route('users.index')->with('message', 'Usuário deletado com sucesso!');
        }
        return redirect()->route('users.index')->with('message', 'Erro: Usuário não foi deletado.');
    }

}
