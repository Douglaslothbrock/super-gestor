<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::simplePaginate(10);

        return view('apps.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('apps.produtos.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:400',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];

        $fedeeback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no minimo 3 Caractere.',
            'nome.max' => 'O campo nome deve ter no máximo 40 Caractere.',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 Caractere.',
            'descricao.max' => 'O campo descricao deve ter no máximo 400 Caractere.',
            'peso.integer' => 'O campo Peso deve ser um número Inteiro',
            'unidade_id.exists' => 'A unidade informada não existe'
        ];

        $request->validate($regras, $fedeeback);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
        // $produto = Produto::where('id', $produto->id);

        return view('apps.produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
        $unidades = Unidade::all();
        return view('apps.produtos.edit', compact('produto', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:400',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];

        $fedeeback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no minimo 3 Caractere.',
            'nome.max' => 'O campo nome deve ter no máximo 40 Caractere.',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 Caractere.',
            'descricao.max' => 'O campo descricao deve ter no máximo 400 Caractere.',
            'peso.integer' => 'O campo Peso deve ser um número Inteiro',
            'unidade_id.exists' => 'A unidade informada não existe'
        ];

        $request->validate($regras, $fedeeback);

        $produto->update($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
        dd($produto);
        $produto->delete();

        $msg = 'Produto Deleta com Sucesso!';
        return redirect()->route('produto.index');
    }
}
