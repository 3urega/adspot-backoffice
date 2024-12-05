<?php

declare(strict_types = 1);

namespace Tests\Shared\Application\Command\Usuario;

use Eurega\Shared\Application\Handler\Usuario\UsuarioParticular\CrearUsuarioParticularCommandHandler;
use Eurega\Shared\Application\Service\Usuario\UsuarioParticular\UsuarioParticularCreator;
use Eurega\Shared\Infrastructure\PhpUnit\CrearUsuarioParticularCommandMother;

use Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario\UsuarioParticularSubModuleUnitTestCase;

use PHPUnit\Framework\Attributes\Test;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario\UsuarioParticularMother;

final class CrearUsuarioParticularCommandHandlerTest extends UsuarioParticularSubModuleUnitTestCase
{

    private CrearUsuarioParticularCommandHandler | null $handler;

	protected function setUp(): void
	{
		parent::setUp();

		$this->handler = new CrearUsuarioParticularCommandHandler(
            new UsuarioParticularCreator(
                $this->usuarioParticularWriteRepository(),
                $this->usuarioParticularReadRepository(), 
                $this->eventBus()
            )
        );
	}

    #[Test]
    public function it_should_create_a_valid_usuario_particular() : void 
    {
        $command = CrearUsuarioParticularCommandMother::create();

		$usuario = UsuarioParticularMother::create( );

		$this->shouldSave();

        $this->shouldNotFoundExistingUser($usuario->direccionEmail());
        
		$this->shouldPublishNamedDomainEvent('shared.usuario.particular.created');

        $this->handler->handle(($command));
    }
}