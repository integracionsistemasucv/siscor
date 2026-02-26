<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumental extends Model
{
    protected $table = 'rad_tipos_documentales';

    protected $fillable = [
        'subserie_id',
        'nombre',
        'dias_termino',
    ];

    public function subSerie (){
        return $this->belongTo(SubSerie::class, 'subserie_id');
    }
}
