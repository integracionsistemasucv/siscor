<?php

namespace Modules\Correspondencia\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CorrespondenciaController
{
    public function index()
    {
       return Inertia::render('Index');

    }

    public function inbox()
    {
       return Inertia::render('BandejaEntrada');

    }

    public function sent()
    {
       return Inertia::render('Enviadas');

    }

    public function pending()
    {
       return Inertia::render('Pendientes');

    }
}
