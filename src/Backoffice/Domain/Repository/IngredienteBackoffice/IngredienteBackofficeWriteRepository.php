<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Domain\Repository\IngredienteBackoffice;

use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;

interface IngredienteBackofficeWriteRepository 
{
    public function nextIdentity(): IdIngredienteBackoffice;

    public function save(IngredienteBackoffice $producto): void;
}
