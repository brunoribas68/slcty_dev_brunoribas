<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formacao;


class FormacaoController extends Controller
{

      public function editarFormacaoById(Request $request){
        if ($request["formacao"] && $request["idFormacao"]) {
          $formacao = Formacao::find($request["idFormacao"])->update($request->all());
          return ["err" => 0 => "data" => "Atualizado com sucesso!"];

        }
          return ["err" => 1, "data" => "Erro ao atualizado!")];
      }


      public function deletarFormacaoById(Request $request){
        return Formacao::find($request["idFormacao"])->delete();
      }

      public static function cadastrarFormacoes($formacoes){
        foreach ($formacoes as $formacao) {
          $experiencia = Formacao::create([
            "idUsuario" => $usuario->idUsuario,
            "experiencia" => $formacao
          ]);
        }
      }
}
