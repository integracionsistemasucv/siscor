<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Usuarios\Services\UserService;

class UsuariosController
{
   public function __construct(private UserService $userService) {}

   // public function index(Request $request)
   // {
   //    $perPage = $request->input('rows', 10);
   //    $users = $this->userService->getPaginatedUsers($perPage);

   //    return Inertia::render(
   //       'usuarios/resources/js/Pages/Index',
   //       [
   //          'users' => $users,
   //       ]
   //    );
   // }

   public function index(Request $request)
{
    // Capturamos los filtros del Request
   $filters = $request->only(['search', 'sortField', 'sortOrder']);

    return Inertia::render('usuarios::Index', [
        // Pasamos los filtros al servicio
        'users' => $this->userService->getPaginatedUsers(10, $filters),
        // Enviamos los filtros de vuelta a la vista para que el input no se vacíe
        'filters' => $filters 
    ]);
}

   public function profile()
   {
      return Inertia::render('usuarios::Profile/Index');
   }
}
