<?php

namespace Modules\Correspondencia\Models;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo'; 

    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $fillable = [
        'nombre_tipo',
    ];

    public function correspondencias()
    {
        return $this->hasMany(Correspondencia::class, 'tipo_id', 'id_tipo');  
    }   
}
