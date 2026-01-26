<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
USE Inertia\Inertia;

class UsuariosController
{
    public function index()
    {
       return Inertia::render('usuarios/resources/js/Pages/Index');
    }

    public function profile()
    {
       return Inertia::render('Profile/Index');
    }
}
