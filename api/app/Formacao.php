<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idFormacao
 * @property string $instituicao
 * @property integer $idUsuario
 * @property string $created_at
 * @property string $updated_at
 * @property Usuario $usuario
 */
class Formacao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'formacao';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idFormacao';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['formacao', 'idUsuario', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'idUsuario', 'idUsuario');
    }
}
