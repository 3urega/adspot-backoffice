<?php

declare(strict_types=1);

namespace App\Backoffice\Frontend\Request\IngredienteBackoffice;

final class CrearIngredienteBackofficeRequest extends IngredienteBackofficeRequest
{
    public static function createEmpty(): CrearIngredienteBackofficeRequest
    {
        return new self(
            '',
            ''
        );
    }

    /**
     * @return string[]
     */
    public function validationGroups(): array
    {
        return ['create'];
    }
}
