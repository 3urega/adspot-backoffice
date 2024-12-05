<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Ingrediente;

use Eurega\Backoffice\Application\Command\IngredienteBackoffice\CreaIngredienteBackofficeCommand;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;
use Eurega\Shared\Infrastructure\PhpUnit\UuidMother;
use Eurega\Shared\Infrastructure\PhpUnit\WordMother;

final class CrearIngredienteBackofficeCommandMother
{
	public static function create(
		?NombreIngredienteBackoffice $nombre = null,
		?IdIngredienteBackoffice $id = null
	): CreaIngredienteBackofficeCommand {
		return new CreaIngredienteBackofficeCommand(
			$nombre?->asString() ?? WordMother::create(),
			$id?->asString() ?? UuidMother::create()
		);
	}
}
