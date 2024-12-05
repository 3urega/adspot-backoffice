<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Ingrediente;

use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Backoffice\Domain\Repository\IngredienteBackoffice\IngredienteBackofficeReadRepository;
use Eurega\Backoffice\Domain\Repository\IngredienteBackoffice\IngredienteBackofficeWriteRepository;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;

use Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

use Mockery;
use Mockery\MockInterface;

abstract class IngredienteBackofficeModuleUnitTestCase extends UnitTestCase
{

	protected IngredienteBackofficeReadRepository | MockInterface | null $ingredienteBackofficeReadRepository = null;

	protected IngredienteBackofficeWriteRepository | MockInterface | null $ingredienteBackofficeWriteRepository = null;

	
	protected function shouldSave(): void
	{
		$this->ingredienteBackofficeWriteRepository
			->shouldReceive('save')
			->with(Mockery::type(IngredienteBackoffice::class))
			->once()
			->andReturnNull();
	}

	protected function shouldSearch(IdIngredienteBackoffice $id, IngredienteBackoffice $ingrediente): void
	{
		$this->ingredienteBackofficeReadRepository()
			->shouldReceive('search')
			// ->withAnyArgs()
			->with($this->isIdIngredienteBackoffice($id))
			->once()
			->andReturn($ingrediente);
	}

	protected function shouldNotFoundExistingIngrediente(NombreIngredienteBackoffice $nombre): void
	{
		$this->ingredienteBackofficeReadRepository()
			->shouldReceive('ofNombreAndFail')
			// ->withAnyArgs()
			->with($this->isNombreIngredienteBackoffice($nombre, 0))
			->once()
			->andReturn(null);
	}

	private function isIdIngredienteBackoffice(mixed $arg) {
		return $arg::class == IdIngredienteBackoffice::class;
	}

	private function isNombreIngredienteBackoffice(mixed $arg) {
		return $arg::class == NombreIngredienteBackoffice::class;
	}

	protected function ingredienteBackofficeReadRepository(): IngredienteBackofficeReadRepository | MockInterface {
		return $this->ingredienteBackofficeReadRepository ??= $this->mock(IngredienteBackofficeReadRepository::class);
	}

	protected function ingredienteBackofficeWriteRepository(): IngredienteBackofficeWriteRepository | MockInterface {
		return $this->ingredienteBackofficeWriteRepository ??= $this->mock(IngredienteBackofficeWriteRepository::class);
	}
}