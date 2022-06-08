<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(Request $request) {

        $clientes = Cliente::simplePaginate(10);
        $request = $request->all();
        return view('apps.clientes.index', compact('clientes', 'request'));
    }

    public function create()
    {

        return view('apps.clientes.index');
    }

    public function show()
    {

    }
}
