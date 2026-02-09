<?php

namespace Modules\Correspondencia\Models;

use Illuminate\Database\Eloquent\Model;

class Correspondencia extends Model
{
    protected $table = 'correspondencia';
    protected $fillable = ['archivo','tipo_id','categoria_id','estatus_id'];

    public function tipo()
    {
        return $this->belongsTo(Tipos::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }
    public function estatus()
    {
        return $this->belongsTo(Estatus::class);
    }
}
