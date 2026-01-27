<?php

namespace Modules\Usuarios\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Modules\Usuarios\Repositories\Contracts\UserRepositoryInterface;
use Modules\Usuarios\Repositories\Eloquent\EloquentUserRepository;

class UsuariosServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		$this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
	}
	
	public function boot(): void
	{
	}
}
