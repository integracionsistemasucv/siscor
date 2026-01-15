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
}
