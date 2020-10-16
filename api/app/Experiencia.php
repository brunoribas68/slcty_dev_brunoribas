<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idExperiencia
 * @property string $experiencia
 * @property integer $idUsuario
 * @property string $created_at
 * @property string $updated_at
 * @property Usuario $usuario
 */
class Experiencia extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'experiencia';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idExperiencia';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['experiencia', 'idUsuario', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'idUsuario', 'idUsuario');
    }
}
