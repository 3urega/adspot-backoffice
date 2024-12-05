<?php

declare(strict_types=1);

namespace App\Backoffice\Frontend\Request\Usuario;

final class CrearUsuarioParticularRequest extends CrearUsuarioRequest
{
    public static function createEmpty(): CrearUsuarioParticularRequest
    {
        return new self(
            '',
            '',
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
