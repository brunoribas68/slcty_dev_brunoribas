<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formacao;


class FormacaoController extends Controller
{

  public static function editarFormacaoById($formacao,$usuario){
    if (isset($formacao["formacao"]) && isset($formacao["idFormacao"])) {
      $formacao = Formacao::find($formacao["idFormacao"])->update(["formacao" => $formacao["formacao"]]);
      return ["err" => 0, "data" => "Atualizado com sucesso!"];
    }else{
      self::cadastrarFormacoes([$formacao],$usuario);
    }
      return ["err" => 1, "data" => "Erro ao atualizado!"];
  }

  public static function deletarFormacaoById($idFormacao){
    Formacao::find($idFormacao)->delete();
    return ["err" => 0, "data" => 'Deletado com sucesso!'];
  }

  public static function cadastrarFormacoes($formacoes,$usuario){
    foreach ($formacoes as $formacao) {
      $experiencia = Formacao::create([
        "idUsuario" => $usuario->idUsuario,
        "formacao" => $formacao
      ]);
    }
  }

}
