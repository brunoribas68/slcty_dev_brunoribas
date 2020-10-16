<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experiencia;


class ExperienciaController extends Controller
{

  public static function editarExperienciaById($experiencia,$usuario){
    if (isset($experiencia["experiencia"]) && isset($experiencia["idExperiencia"])) {
      $experiencia = Experiencia::find($experiencia["idExperiencia"])->update(["experiencia" => $experiencia["experiencia"]]);
      return ["err" => 0, "data" => "Atualizado com sucesso!"];
    }else{
      self::cadastrarExperiencias([$experiencia],$usuario);
    }
      return ["err" => 1, "data" => "Erro ao atualizado!"];
  }

  public static function deletarExperienciaById($idExperiencia){
    Experiencia::find($idExperiencia)->delete();
    return ["err" => 0, "data" => 'Deletado com sucesso!'];
  }

  public static function cadastrarExperiencias($experiencias,$usuario){
    foreach ($experiencias as $experiencia) {
      if ($experiencia) {
        $experiencia = Experiencia::create([
          "idUsuario" => $usuario->idUsuario,
          "experiencia" => $experiencia
        ]);
      }
    }
  }
}
