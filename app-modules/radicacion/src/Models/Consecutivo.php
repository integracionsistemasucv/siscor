<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;

class Consecutivo extends Model
{
    protected $table = 'rad_consecutivos';

    protected $fillable = [
        'tipo_radicado_id',
        'anio',
        'ultimo_valor',
    ];

    public function tipoRadicado()
    {
        return $this->belongsTo(TipoRadicado::class, 'tipo_radicado_id');
    }
}
