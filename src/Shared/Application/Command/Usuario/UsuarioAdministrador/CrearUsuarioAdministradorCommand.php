<?php

declare(strict_types=1);

namespace Eurega\Shared\Application\Command\Usuario\UsuarioAdministrador;

class CrearUsuarioAdministradorCommand
{
    public function __construct(
        public string $nombre,
        public string $email,
    ) {
    }
}
