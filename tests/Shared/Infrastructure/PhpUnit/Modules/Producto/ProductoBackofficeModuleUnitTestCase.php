<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Producto;

use Eurega\Backoffice\Domain\Model\ProductoBackoffice\ProductoBackoffice;
use Eurega\Backoffice\Domain\Repository\ProductoBackoffice\ProductoBackofficeReadRepository;
use Eurega\Backoffice\Domain\Repository\ProductoBackoffice\ProductoBackofficeWriteRepository;
use Eurega\Shared\Domain\Model\Usuario\UsuarioAdministradorModel;
use Eurega\Shared\Domain\ValueObject\Common\EmailAddress;
use Eurega\Shared\Domain\ValueObject\Common\Id;
use Eurega\Shared\Domain\ValueObject\Common\Nombre;
use Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

use Mockery;
use Mockery\MockInterface;

abstract class ProductoBackofficeModuleUnitTestCase extends UnitTestCase
{

	protected ProductoBackofficeReadRepository | MockInterface | null $productoBackofficeReadRepository = null;

	protected ProductoBackofficeWriteRepository | MockInterface | null $productoBackofficeWriteRepository = null;

	
	protected function shouldSave(): void
	{
		$this->productoBackofficeWriteRepository
			->shouldReceive('save')
			->with(Mockery::type(ProductoBackoffice::class))
			->once()
			->andReturnNull();
	}

	protected function shouldSearch(Id $id, ?ProductoBackoffice $producto): void
	{
		$this->productoBackofficeReadRepository()
			->shouldReceive('search')
			->with($this->similarTo($id))
			->once()
			->andReturn($producto);
	}

	protected function shouldNotFoundExistingUser(Nombre $nombre): void
	{
		$this->productoBackofficeReadRepository()
			->shouldReceive('ofNombreAndFail')
			// ->withAnyArgs()
			->with($this->isNombre($nombre, 0))
			->once()
			->andReturn(null);
	}

	private function isNombre(mixed $arg) {
		return $arg::class == Nombre::class;
	}

	protected function productoBackofficeReadRepository(): ProductoBackofficeReadRepository | MockInterface {
		return $this->productoBackofficeReadRepository ??= $this->mock(ProductoBackofficeReadRepository::class);
	}

	protected function productoBackofficeWriteRepository(): ProductoBackofficeWriteRepository | MockInterface {
		return $this->productoBackofficeWriteRepository ??= $this->mock(ProductoBackofficeWriteRepository::class);
	}
}