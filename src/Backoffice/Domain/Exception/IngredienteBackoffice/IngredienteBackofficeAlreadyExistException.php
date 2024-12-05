<?php

namespace Eurega\Backoffice\Domain\Exception\IngredienteBackoffice;

use Eurega\Shared\Domain\Exception\DomainException;

final class IngredienteBackofficeAlreadyExistException extends DomainException
{
    public function __construct(string $code = '') {
        parent::__construct($code);
    }
}