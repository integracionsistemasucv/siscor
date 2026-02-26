<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRadicado extends Model
{
    protected $table = 'rad_tipos_radicados';

    protected $fillable = [
        'nombre',
        'descripcion',
        'prefijo',
        'longitud_secuencia',
    ];

    public function radicados()
    {
        return $this->hasMany(Radicado::class, 'tipo_radicado_id');
    }

    public function consecutivo()
    {
        return $this->hasMany(Consecutivo::class, 'tipo_radicado_id');
    }

}
