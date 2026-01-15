<?php

namespace Modules\Correspondencia\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

use Modules\Correspondencia\Repositories\Contracts\CrudTablasRepositoryInterface;
use Modules\Correspondencia\Repositories\Contracts\CategoriasRepositoryInterface;
use Modules\Correspondencia\Repositories\Contracts\EstatusRepositoryInterface;
use Modules\Correspondencia\Repositories\Contracts\TiposRepositoryInterface;

use Modules\Correspondencia\Repositories\Eloquent\EstatusRepository;
use Modules\Correspondencia\Repositories\Eloquent\TiposRepository;
use Modules\Correspondencia\Repositories\Eloquent\CategoriasRepository;
use Modules\Correspondencia\Repositories\Eloquent\CrudTablasRepository;	

class CorrespondenciaServiceProvider extends ServiceProvider
{
	public function register(): void {

		$this->app->bind(TiposRepositoryInterface::class, TiposRepository::class);
		$this->app->bind(CategoriasRepositoryInterface::class, CategoriasRepository::class);
		$this->app->bind(EstatusRepositoryInterface::class, EstatusRepository::class);
		$this->app->bind(CrudTablasRepositoryInterface::class, CrudTablasRepository::class);
	}

	public function boot(): void
	{

		// para uso general(sesiones, usuarios, etc)
		// Route::middleware('web')
		// 	->group(__DIR__ . '/../../routes/correspondencia-routes.php');

		// para testear en postman
		Route::middleware('api')
			->group(__DIR__ . '/../../routes/correspondencia-routes.php');
	}
}
