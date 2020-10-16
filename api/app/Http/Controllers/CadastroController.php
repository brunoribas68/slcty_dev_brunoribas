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
      $experiencia = ExperienciaController::cadastrarExperiencias($request["experiencia"]);
      $formacao = FormacaoController::cadastrarFormacoes($request["formacao"]);

      return ["err" => 0, "data" => "Cadastrado com sucesso!"];
    }


    public function getCadastros(){
      return Usuario::all();
    }

    public function getCadastroById(Request $request){
      return Usuario::find($request["idUsuario"]);
    }


    public function deletarCadastroById(Request $request){
      return Usuario::find($request["idUsuario"])->delete();
    }

    public function editarUsuarioById(Request $request){
      $usuario = Usuario::validate($request);
      if ($usuario->errors()->messages()) {
        return ["err" => 1, "data" => $usuario->errors()->messages()];
      }

      $usuario = Usuario::find($request["idUsuario"])->update($request->all());
      return ["err" => 0,  "data" => "Atualizado com sucesso!"];
    }

}
