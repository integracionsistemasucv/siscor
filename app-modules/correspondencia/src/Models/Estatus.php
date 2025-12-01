<?php

namespace Modules\Correspondencia\Models;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    protected $table = 'estatus';
    protected $primaryKey = 'id_estatus'; 

    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $fillable = [
        'nombre_estatus',
    ];

    public function correspondencias()
    {
        return $this->hasMany(Correspondencia::class, 'estatus_id', 'id_estatus');  
    }
}
