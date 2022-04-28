<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {

        $motivo_contato = MotivoContato::all();
        
        return view('site.principal', ['motivo_contato' => $motivo_contato ]);
    }
}
