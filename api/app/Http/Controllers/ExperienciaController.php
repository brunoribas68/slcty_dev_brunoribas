<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experiencia;


class ExperienciaController extends Controller
{
  public function editarExperienciaById(Request $request){
    if ($request["experiencia"] && $request["idExperiencia"]) {
      $experiencia = Experiencia::find($request["idExperiencia"])->update($request->all());
      return ["err" => 0 => "data" => "Atualizado com sucesso!"];

    }
      return ["err" => 1, "data" => "Erro ao atualizado!")];
  }

  public function deletarExperienciaById(Request $request){
    return Formacao::find($request["idFormacao"])->delete();
  }

  public static function  cadastrarExperiencias($experiencias){
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
