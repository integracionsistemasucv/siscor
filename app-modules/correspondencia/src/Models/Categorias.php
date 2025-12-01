<?php

namespace Modules\Correspondencia\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria'; 

    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $fillable = [
        'nombre_categoria',
    ];

    public function correspondencias()
    {
        return $this->hasMany(Correspondencia::class, 'categoria_id', 'id_categoria');  
    }
}
