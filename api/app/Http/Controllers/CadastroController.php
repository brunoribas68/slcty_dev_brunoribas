<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\FormacaoController;
use App\Usuario;

class CadastroController extends Controller
{
    public function cadastrar(Request $request){
      $usuario = Usuario::validate($request);
      if ($usuario->errors()->messages()) {
        return ["err" => 1, "data" => $usuario->errors()->messages()];
      }
      $usuario = Usuario::create($request->all());
      $experiencia = ExperienciaController::cadastrarExperiencias($request["experiencia"],$usuario);
      $formacao = FormacaoController::cadastrarFormacoes($request["formacao"],$usuario);

      return ["err" => 0, "data" => "Cadastrado com sucesso!"];
    }

    public function getCadastros(){
      return Usuario::with(['experiencias','formacoes'])->get();
    }

    public function getCadastroById(Request $request){
      return Usuario::with(['experiencias','formacoes'])->find($request["idUsuario"]);
    }

    public function deletarCadastroById(Request $request){
      $usuario = Usuario::find($request["idUsuario"]);
      foreach ($usuario->formacoes()->get() as $formacao) {
        $formacao = FormacaoController::deletarFormacaoById($formacao->idFormacao);
      }
      foreach ($usuario->experiencias()->get() as $experiencia) {
        $experiencia = ExperienciaController::deletarExperienciaById($experiencia->idExperiencia);
      }
      $usuario = $usuario->delete();
      return ["err" => 0,  "data" => "Deletado com sucesso!"];
    }

    public function editarCadastroById(Request $request){
      $usuario = Usuario::validate($request);
      if ($usuario->errors()->messages()) {
        return ["err" => 1, "data" => $usuario->errors()->messages()];
      }
      $dados = $request->all();
      if ($request["senha"] == "*********") {
        unset($dados["senha"]);
        unset($dados["senha_confirmation"]);
      }
      $usuario = Usuario::find($dados["idUsuario"])->update($dados);
      $usuario = Usuario::find($dados["idUsuario"]);
      foreach ($dados["formacao"] as $formacao) {
        if ($formacao) {
          $formacao = FormacaoController::editarFormacaoById($formacao,$usuario);
        }
      }
      foreach ($dados["experiencia"] as $experiencia) {
        if ($experiencia) {
          $experiencia = ExperienciaController::editarExperienciaById($experiencia,$usuario);
        }
      }
      return ["err" => 0,  "data" => "Atualizado com sucesso!"];
    }

}
