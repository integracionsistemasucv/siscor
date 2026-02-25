<?php

namespace Modules\Radicacion\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Usuarios\Models\User;

class Historico extends Model
{
    protected $table = 'rad_historicos';

    protected $fillable = [
        'radicado_id',
        'usuario_origen_id',
        'usuario_destino_id',
        'tipo_movimiento',
        'descripcion',
        'ip_address',
        'user_agent',
    ];

    public function radicado()
    {
        return $this->belongsTo(Radicado::class);
    }

    public function usuarioOrigen()
    {
        return $this->belongsTo(User::class, 'usuario_origen_id');
    }

    public function usuarioDestino()
    {
        return $this->belongsTo(User::class, 'usuario_destino_id');
    }
}
