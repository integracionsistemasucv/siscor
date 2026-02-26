<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'rad_series';

    protected $fillable = [
        'codigo',
        'nombre',
        'dependencia_id',
    ];

    public function subSeries(){
        return $this->hasMany(SubSerie::class, 'serie_id'); 
    }
}
