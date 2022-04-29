<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index() {
        
        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
    }

    public function store(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos,email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $validacao = [
            'nome.required' => 'O Campo Nome é Obrigatório.',
            'nome.min' => 'No campo Nome é Preciso no minimo 3 caracteres.',
            'telefone.required' => 'O campo Telefone é Obrigatório',
            'email.email' => 'O campo E-mail é Obrigatório',
            'email.unique' => 'O campo E-mail já está em uso',
            'motivo_contatos_id.required' => 'O campo Motivo contatos é Obrigatório',
            'mensagem.required' => 'O campo Mensagem é Obrigatório',

            'required' => 'O campo :atribute deve ser preenchido.' 
        ];

        $request->validate( $regras, $validacao);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
        // return redirect()->route('site.contato')->with('success', 'Contato Enviado com sucesso');
    }
}
