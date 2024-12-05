<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Application\Handler\ProductoBackoffice;

use Eurega\Backoffice\Application\Command\ProductoBackoffice\CreaProductoBackofficeCommand;
use Eurega\Backoffice\Application\Request\ProductoBackoffice\ProductoBackofficeCreatorRequest;
use Eurega\Backoffice\Application\Service\ProductoBackoffice\ProductoBackofficeCreator;

use Eurega\Shared\Domain\Bus\Command\CommandHandler;

final readonly class CreaProductoBackofficeCommandHandler implements CommandHandler
{
	public function __construct(
		private ProductoBackofficeCreator $creator
	) {}

	public function handle(CreaProductoBackofficeCommand $command): void
	{

		$this->creator->__invoke( 
			new ProductoBackofficeCreatorRequest(
				$command->id(),
				$command->nombre()
			)
			
		);
	}
}
