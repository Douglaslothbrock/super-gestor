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
        
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos,email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
        // return redirect()->route('site.contato')->with('success', 'Contato Enviado com sucesso');
    }
}
