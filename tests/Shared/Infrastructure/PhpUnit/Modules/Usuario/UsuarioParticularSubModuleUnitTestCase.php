<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario;

use Eurega\ShoppingList\Domain\Model\UsuarioParticular\UsuarioParticular;
use Eurega\ShoppingList\Domain\Repository\UsuarioParticular\UsuarioParticularReadRepository;
use Eurega\Shared\Domain\Repository\Usuario\UsuarioParticularWriteRepository;
use Eurega\Shared\Domain\ValueObject\Common\EmailAddress;
use Eurega\Shared\Domain\ValueObject\Common\Id;

use Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

use Mockery;
use Mockery\MockInterface;

abstract class UsuarioParticularSubModuleUnitTestCase extends UnitTestCase
{

	protected UsuarioParticularReadRepository | MockInterface | null $usuarioParticularReadRepository = null;

	protected UsuarioParticularWriteRepository | MockInterface | null $usuarioParticularWriteRepository = null;

	
	protected function shouldSave(): void
	{
		$this->usuarioParticularWriteRepository
			->shouldReceive('save')
			->with(Mockery::type(UsuarioParticular::class))
			->once()
			->andReturnNull();
	}

	protected function shouldSearch(Id $id, ?UsuarioParticular $usuario): void
	{
		$this->usuarioParticularReadRepository()
			->shouldReceive('search')
			->with($this->similarTo($id))
			->once()
			->andReturn($usuario);
	}
	
	protected function shouldNotFoundExistingUser(EmailAddress $email): void
	{
		$this->usuarioParticularReadRepository()
			->shouldReceive('ofDireccionEmailAndFail')
			->with($this->similarTo($email))
			->once()
			->andReturn(null);
	}

	protected function usuarioParticularReadRepository(): UsuarioParticularReadRepository | MockInterface {
		return $this->usuarioParticularReadRepository ??= $this->mock(UsuarioParticularReadRepository::class);
	}

	protected function usuarioParticularWriteRepository(): UsuarioParticularWriteRepository | MockInterface {
		return $this->usuarioParticularWriteRepository ??= $this->mock(UsuarioParticularWriteRepository::class);
	}
}