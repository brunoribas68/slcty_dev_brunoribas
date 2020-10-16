<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Facades\CurlController;

class FormularioController extends Controller
{
    public function index(){
      return view("formulario");
    }

    public function cadastro(Request $request){
        $dados = $request->except("_token");
        $url = "http://localhost/slcty_dev_brunoribas/api/api/cadastrar";
        dd(json_encode($dados));
        $requisicao = CurlController::consultaPOST($url,json_encode($dados));
        $requisicao = json_decode($requisicao,true);
        dd($requisicao);
        if ($requisicao["err"]  == 1) {
          return back()->with(["erros" => $requisicao["data"]]);
        }
    }
}
