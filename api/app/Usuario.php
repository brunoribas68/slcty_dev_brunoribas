<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Validator;

/**
 * @property integer $idUsuario
 * @property string $nome
 * @property string $email
 * @property string $telefone
 * @property string $usuario
 * @property string $senha
 * @property Experiencium[] $experiencias
 * @property Formacao[] $formacaos
 */
class Usuario extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idUsuario';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'email', 'telefone', 'usuario', 'senha'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiencias()
    {
        return $this->hasMany('App\Experiencium', 'idUsuario', 'idUsuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formacaos()
    {
        return $this->hasMany('App\Formacao', 'idUsuario', 'idUsuario');
    }


    public static function validate($request){

      return  Validator::make($request->all(), [
          'nome' => 'required|max:255',
          'email' => [Rule::requiredIf(function () use ($request) {
              return is_null($request->telefone);
          }),'email:rfc,dns'],
          'telefone' => Rule::requiredIf(function () use ($request) {
              return is_null($request->email);
          }),
          'usuario' => 'required|max:255',
          'senha ' => 'required|max:255|confirmed',
        ]);
    }
}
