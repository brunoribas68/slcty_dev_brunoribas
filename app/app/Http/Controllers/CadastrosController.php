<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Facades\CurlController;

class CadastrosController extends Controller
{
    public function listagem(){
      $requisicao = $this->getCadastros();
      return view("listagem")->with("cadastros",$requisicao);
    }

    public function deletarCadastro($idUsuario){
      $url = "http://localhost/slcty_dev_brunoribas/api/api/deletarCadastroById";
      $requisicao = CurlController::consultaPOST($url,json_decode(["idUsuario" => $idUsuario]));
      $requisicao = json_decode($requisicao,true);
      return view("listagem")->with("cadastros",$requisicao);
    }

    private function getCadastros(){
      $url = "http://localhost/slcty_dev_brunoribas/api/api/getCadastros";
      $requisicao = CurlController::consultaGET($url);
      $requisicao = json_decode($requisicao,true);
      return $requisicao;
    }

    public function formularioEditarCadastro($idUsuario){
      $url = "http://localhost/slcty_dev_brunoribas/api/api/getCadastroById";
      $requisicao = CurlController::consultaPOST($url,json_encode(["idUsuario" => $idUsuario]));
      $requisicao = json_decode($requisicao,true);
      return view("editar")->with("dados", $requisicao);
    }

    public function editarCadastro(Request $request){
      $url = "http://localhost/slcty_dev_brunoribas/api/api/editarCadastroById";
      $dados = $request->except(["_token"]);
      $requisicao = CurlController::consultaPOST($url,json_encode($dados));
      $requisicao = json_decode($requisicao,true);
      if ($requisicao["err"]  == 1) {
        return redirect()->route('formularioEditarCadastro',$dados["idUsuario"])->with("erros" ,$requisicao["data"]);
      }
      return redirect("listagemCadastros");
    }

    public function deletarFormacao($idFormacao){
      $url = "http://localhost/slcty_dev_brunoribas/api/api/deletarFormacaoById/".$idFormacao;
      $requisicao = CurlController::consultaGET($url);
      $requisicao = json_decode($requisicao,true);
      if (isset($requisicao["err"]) && $requisicao["err"] == 0) {
        return redirect("listagemCadastros");
      }
    }

    public function deletarExperiencia($idExperiencia){

      $url = "http://localhost/slcty_dev_brunoribas/api/api/deletarExperienciaById/".$idExperiencia;
      $requisicao = CurlController::consultaGET($url);
      $requisicao = json_decode($requisicao,true);
      if (isset($requisicao["err"]) && $requisicao["err"] == 0) {
        return redirect("listagemCadastros");
      }
    }
}
