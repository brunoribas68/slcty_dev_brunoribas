<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Facades\CurlController;

class FormularioController extends Controller
{
    public function index(){
      return view("formulario");
    }

    public function cadastrar(Request $request){
      dd($request->all());
    }

    public function cadastro(Request $request){
        dd($request->all());
    }
}
