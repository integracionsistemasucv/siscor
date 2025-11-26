<?php

namespace Modules\Correspondencia\Models;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    protected $table = 'tipo';

    protected $fillable = [
        'nombre_tipo',
    ];
}
