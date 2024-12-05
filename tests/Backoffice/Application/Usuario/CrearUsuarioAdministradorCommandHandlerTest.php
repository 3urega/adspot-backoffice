<?php

declare(strict_types = 1);

namespace Tests\Backoffice\Application\Usuario;

use Eurega\Shared\Application\Handler\Usuario\UsuarioAdministrador\CrearUsuarioAdministradorCommandHandler;
use Eurega\Shared\Application\Service\Usuario\Administrador\UsuarioAdministradorCreator;
use PHPUnit\Framework\Attributes\Test;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario\CrearUsuarioAdministradorCommandMother;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario\UsuarioAdministradorMother;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario\UsuarioAdministradorSubModuleUnitTestCase;

final class CrearUsuarioAdministradorCommandHandlerTest extends UsuarioAdministradorSubModuleUnitTestCase
{

    private CrearUsuarioAdministradorCommandHandler | null $handler;

	protected function setUp(): void
	{
		parent::setUp();

		$this->handler = new CrearUsuarioAdministradorCommandHandler(
            new UsuarioAdministradorCreator(
                $this->UsuarioAdministradorReadRepository(), 
                $this->UsuarioAdministradorWriteRepository(),
                $this->eventBus()
            )
        );
	}

    #[Test]
    public function it_should_create_a_valid_usuario_administrador() : void 
    {
        $command = CrearUsuarioAdministradorCommandMother::create();

		$usuario = UsuarioAdministradorMother::create(
            $this->usuarioAdministradorWriteRepository(),
            $this->eventBus()
        );

		$this->shouldSave();

        $this->shouldNotFoundExistingUser($usuario->direccionEmail());
        
		$this->shouldPublishNamedDomainEvent('backend.usuario.administrador.created');

        $this->handler->handle(($command));
    }
}