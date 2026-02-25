<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Usuarios\Models\User;

class Radicado extends Model
{
    protected $table = 'radicados';

    protected $fillable = [
        'numero_radicado',
        'fecha_radicado',
        'asunto',
        'usuario_creador_id',
        'usuario_actual_id',
        'tipo_radicado_id',
    ];

    public function tipoRadicado()
    {
        return $this->belongsTo(TipoRadicado::class, 'tipo_radicado_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class)->orderBy('created_at', 'desc');
    }

    public function usuarioActual()
    {
        return $this->belongsTo(User::class, 'usuario_actual_id');
    }

}
