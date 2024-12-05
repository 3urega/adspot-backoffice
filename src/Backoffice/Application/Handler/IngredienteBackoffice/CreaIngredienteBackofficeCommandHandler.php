<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Application\Handler\IngredienteBackoffice;

use Eurega\Backoffice\Application\Command\IngredienteBackoffice\CreaIngredienteBackofficeCommand;
use Eurega\Backoffice\Application\Request\IngredienteBackoffice\IngredienteBackofficeCreatorRequest;
use Eurega\Backoffice\Application\Request\ProductoBackoffice\ProductoBackofficeCreatorRequest;
use Eurega\Backoffice\Application\Service\IngredienteBackoffice\IngredienteBackofficeCreator;
use Eurega\Backoffice\Application\Service\ProductoBackoffice\ProductoBackofficeCreator;

use Eurega\Shared\Domain\Bus\Command\CommandHandler;

final readonly class CreaIngredienteBackofficeCommandHandler implements CommandHandler
{
	public function __construct(
		private IngredienteBackofficeCreator $creator
	) {}

	public function handle(CreaIngredienteBackofficeCommand $command): void
	{

		$this->creator->__invoke( 
			new IngredienteBackofficeCreatorRequest(
				$command->id(),
				$command->nombre()
			)
			
		);
	}
}
