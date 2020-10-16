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
        $usuario = Usuario::validate($request);
        if ($usuario->errors()->messages()) {
          return ["err" => 1, "data" => $usuario->errors()->messages()];
        }
        $url = "http://localhost/slcty_dev_brunoribas/api/api/cadastrar";
        $requisicao = CurlController::consultaPOST($url,json_encode($dados));
        $requisicao = json_decode($requisicao,true);
        if ($requisicao["err"]  == 1) {
          return redirect('/')->with("erros" ,$requisicao["data"]);
        }
        return redirect("/listagemCadastros");
    }
}
