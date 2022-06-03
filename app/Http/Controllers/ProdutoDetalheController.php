<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $produtos = Produto::all(); 
        return view('apps.produto-detalhes.create', compact('unidades', 'produtos'));
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
        if(ProdutoDetalhe::create($request->all()))
            echo 'deu bom';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produto_detalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        //
        $unidades = Unidade::all();
        $produtos = Produto::all(); 
        return view('apps.produto-detalhes.edit', compact('produto_detalhe', 'produtos', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        //
        $produto_detalhe->update($request->all());
        echo'Atualizou';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produto_detalhe)
    {
        //
    }
}
