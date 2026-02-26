<?php

namespace Modules\Radicacion\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Radicacion\Repositories\Contracts\RadicadoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\TipoRadicadoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\ConsecutivoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\HistoricoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\SerieRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\SubSerieRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\TipoDocumentalRepositoryInterface;

use Modules\Radicacion\Repositories\Eloquent\EloquentRadicadoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentTipoRadicadoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentConsecutivoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentHistoricoRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentSerieRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentSubSerieRepository;
use Modules\Radicacion\Repositories\Eloquent\EloquentTipoDocumentalRepository;

class RadicacionServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		$this->app->bind(RadicadoRepositoryInterface::class, EloquentRadicadoRepository::class);
		$this->app->bind(TipoRadicadoRepositoryInterface::class, EloquentTipoRadicadoRepository::class);
		$this->app->bind(ConsecutivoRepositoryInterface::class, EloquentConsecutivoRepository::class);
		$this->app->bind(HistoricoRepositoryInterface::class, EloquentHistoricoRepository::class);
		$this->app->bind(SerieRepositoryInterface::class, EloquentSerieRepository::class);
		$this->app->bind(SubSerieRepositoryInterface::class, EloquentSubSerieRepository::class);
		$this->app->bind(TipoDocumentalRepositoryInterface::class, EloquentTipoDocumentalRepository::class);
	}
	
	public function boot(): void
	{
	}
}
