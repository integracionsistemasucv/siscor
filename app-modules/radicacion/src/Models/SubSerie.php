<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;

class SubSerie extends Model
{
    protected $table = 'rad_subseries';

    protected $fillable= [
        'serie_id',
        'codigo',
        'nombre',
    ];

    public function serie (){
        return $this->belongTo(Serie::class, 'serie_id');
    }

    public function tiposDocumentales(){
        return $this->hasMany(TipoDocumental::class, 'subserie_id'); 
    }
}
