<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if($request->erro == 1)
            $erro = 'Usuário e(ou) senha não existe';
        
        if($request->erro == 2)
            $erro = 'Necessário Login para acessar o Sistema!!';

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = 
        [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $validacao = 
        [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $validacao);

        $email = $request->usuario;
        $pass = $request->senha;

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $pass)->get()->first();
        
        if (isset($usuario->name))
        {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');
        }
        else
        {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        // print_r($request->all());
    }

    public function sair()
    {
        echo 'Sair';
    }


}

