<?php

namespace Modules\Radicacion\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Radicacion\Repositories\Contracts\RadicadoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\TipoRadicadoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\ConsecutivoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\HistoricoRepositoryInterface;

use Modules\Radicacion\Repositories\Eloquent\EloquentRadicadoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentTipoRadicadoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentConsecutivoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentHistoricoRepository;

class RadicacionServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		$this->app->bind(RadicadoRepositoryInterface::class, EloquentRadicadoRepository::class);
		$this->app->bind(TipoRadicadoRepositoryInterface::class, EloquentTipoRadicadoRepository::class);
		$this->app->bind(ConsecutivoRepositoryInterface::class, EloquentConsecutivoRepository::class);
		$this->app->bind(HistoricoRepositoryInterface::class, EloquentHistoricoRepository::class);
	}
	
	public function boot(): void
	{
	}
}
