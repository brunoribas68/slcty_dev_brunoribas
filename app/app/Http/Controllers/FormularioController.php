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
        $dados = $request->except("_token");
        $url = "http://localhost/slcty_dev_brunoribas/api/api/cadastrar";
        $requisicao = CurlController::consultaPOST($url,json_encode($dados));
        $requisicao = json_decode($requisicao,true);
        if ($requisicao["err"]  == 1) {
          return back()->with(["erros" => $requisicao["data"]])->withInput();
        }
    }
}
