<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobrenosController extends Controller
{
    public function index() {
        return view('site.sobre-nos');
    }
}
