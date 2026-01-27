<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Usuarios\Services\UserService;

class UsuariosController
{
   public function __construct(private UserService $userService) {}

   public function index()
   {
      $users = $this->userService->getAllUsers();

      return Inertia::render(
         'usuarios/resources/js/Pages/Index',
         [
            'users' => $users,
         ]
      );
   }

   public function profile()
   {
      return Inertia::render('Profile/Index');
   }
}
