<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Ingrediente;

use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;

use Eurega\Shared\Infrastructure\PhpUnit\UuidMother;
use Eurega\Shared\Infrastructure\PhpUnit\WordMother;

final class IngredienteBackofficeMother
{
	public static function create(
    ): IngredienteBackoffice
	{
		return IngredienteBackoffice::crear(
            IdIngredienteBackoffice::fromString(UuidMother::create()),
            NombreIngredienteBackoffice::fromString(WordMother::create())
        );
	}
}
