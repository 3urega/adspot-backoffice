<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Application\Command\IngredienteBackoffice;

use Eurega\Shared\Domain\Bus\Command\Command;

final readonly class CreaIngredienteBackofficeCommand implements Command
{
	public function __construct(
        private string $nombre, 
        private string $id
    ) {}

	public function nombre(): string
	{
		return $this->nombre;
	}

	public function id(): string
	{
		return $this->id;
	}
}
