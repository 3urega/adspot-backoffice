<?php

declare(strict_types = 1);

namespace Tests\Backoffice\Application\IngredienteBackoffice;

use Eurega\Backoffice\Application\Handler\IngredienteBackoffice\CreaIngredienteBackofficeCommandHandler;
use Eurega\Backoffice\Application\Service\IngredienteBackoffice\IngredienteBackofficeCreator;

use PHPUnit\Framework\Attributes\Test;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Ingrediente\CrearIngredienteBackofficeCommandMother;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Ingrediente\IngredienteBackofficeModuleUnitTestCase;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Ingrediente\IngredienteBackofficeMother;

final class CreaIngredienteBackofficeCommandHandlerTest extends IngredienteBackofficeModuleUnitTestCase
{

    private CreaIngredienteBackofficeCommandHandler | null $handler;

	protected function setUp(): void
	{
		parent::setUp();

		$this->handler = new CreaIngredienteBackofficeCommandHandler(
            new IngredienteBackofficeCreator(
                $this->ingredienteBackofficeWriteRepository(),
                $this->ingredienteBackofficeReadRepository(), 
                $this->eventBus()
            )
        );
	}

    #[Test]
    public function it_should_create_a_valid_ingrediente_backoffice() : void 
    {
        $command = CrearIngredienteBackofficeCommandMother::create();

		$ingrediente = IngredienteBackofficeMother::create();

		$this->shouldSave();

        $this->shouldNotFoundExistingIngrediente($ingrediente->nombre());
        
		$this->shouldPublishNamedDomainEvent('backoffice.ingrediente.created');

        $this->handler->handle(($command));
    }
}