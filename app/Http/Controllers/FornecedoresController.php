<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedoresController extends Controller
{
    public function index() {
        return view('apps.fornecedores.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with('Produtos')->where('nome', 'like', '%'.$request->input('nome').'%' )
            ->where('email', 'like', '%'.$request->input('email').'%' )
            ->where('site', 'like', '%'.$request->input('site').'%' )
            ->where('uf', 'like', '%'.$request->input('uf').'%' )
            ->simplePaginate(3);
        $request = $request->all();

        return view('apps.fornecedores.listar', compact('fornecedores', 'request'));
    }

    public function adicionar(Request $request)
    {
        $msg = '';
        if ($request->input('_token') != '') {
            
            $regras = [
                'nome' => 'required|min:3|max:40',
                'email' => 'email',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
            ];

            $fedeeback = [
                'required' => 'O campo :attribute deve ser preenchido.',
                'nome.min' => 'O campo nome deve ter no minimo 3 Caractere.',
                'nome.max' => 'O campo nome deve ter no máximo 40 Caractere.',
                'uf.min' => 'O campo UF deve ter no minimo 2 Caractere.',
                'uf.max' => 'O campo UF deve ter no máximo 2 Caractere.',
                'email.email' => 'O campo E-mail deve ser preenchido.',
            ];

            $request->validate($regras, $fedeeback);

            try {
                DB::beginTransaction();

                Fornecedor::create($request->all());

                DB::commit();

                $msg = 'Fornecedor Cadastrado com Sucesso!!';

            } catch (\Throwable $th) {
                //throw $th;
            }
            
        }
        return view('apps.fornecedores.adicionar', ['msg' => $msg]);
    }

    public function editar($fornecedor)
    {
        $fornecedor = Fornecedor::find($fornecedor);

        return view('apps.fornecedores.adicionar', compact('fornecedor'));
    }

    public function atualizar(Fornecedor $fornecedor, Request $request)
    {
        
        $fornecedor->update($request->all());
                
        $msg = "O Registro foi Atualizado com Sucesso!!!";

        return view('apps.fornecedores.index', compact('msg'));
        
    }

    public function excluir(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        $msg = "O Registro foi Deletado com Sucesso!!!";

        return view('apps.fornecedores.index', compact('msg'));
    }
}
