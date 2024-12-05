<?php

declare(strict_types = 1);

namespace Tests\Backoffice\Application\ProductoBackoffice;

use Eurega\Backoffice\Application\Handler\ProductoBackoffice\CreaProductoBackofficeCommandHandler;
use Eurega\Backoffice\Application\Service\ProductoBackoffice\ProductoBackofficeCreator;
use PHPUnit\Framework\Attributes\Test;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Producto\CrearProductoBackofficeCommandMother as ProductoCrearProductoBackofficeCommandMother;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Producto\ProductoBackofficeModuleUnitTestCase;
use Tests\Shared\Infrastructure\PhpUnit\Modules\Producto\ProductoBackofficeMother;

final class CreaProductoBackofficeCommandHandlerTest extends ProductoBackofficeModuleUnitTestCase
{

    private CreaProductoBackofficeCommandHandler | null $handler;

	protected function setUp(): void
	{
		parent::setUp();

		$this->handler = new CreaProductoBackofficeCommandHandler(
            new ProductoBackofficeCreator(
                $this->productoBackofficeWriteRepository(),
                $this->productoBackofficeReadRepository(), 
                $this->eventBus()
            )
        );
	}

    #[Test]
    public function it_should_create_a_valid_producto_backoffice() : void 
    {
        $command = ProductoCrearProductoBackofficeCommandMother::create();

		$producto = ProductoBackofficeMother::create( );

        $this->shouldNotFoundExistingUser($producto->nombre());

		$this->shouldSave();

		$this->shouldPublishNamedDomainEvent('backoffice.producto.created');

        $this->handler->handle(($command));
    }
}