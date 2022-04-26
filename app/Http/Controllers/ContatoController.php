<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request) {
        dd($request->all());
        return view('site.contato');
    }

    public function store() {

    }
}
