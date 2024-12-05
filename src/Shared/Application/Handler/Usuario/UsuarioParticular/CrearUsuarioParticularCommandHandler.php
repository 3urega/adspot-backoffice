<?php

declare(strict_types=1);

namespace Eurega\Shared\Application\Handler\Usuario\UsuarioParticular;

use Eurega\Shared\Application\Command\Usuario\UsuarioParticular\CrearUsuarioParticularCommand;
use Eurega\Shared\Application\Request\Usuario\UsuarioParticular\UsuarioParticularCreatorRequest;
use Eurega\Shared\Application\Service\Usuario\UsuarioParticular\UsuarioParticularCreator;

use Throwable;

class CrearUsuarioParticularCommandHandler
{
    public function __construct(
        private UsuarioParticularCreator $creator
    ) {

    }

    public function handle(CrearUsuarioParticularCommand $command): void {


        $this->creator->create(new UsuarioParticularCreatorRequest(
            $command->email,
            $command->password,
            $command->nombre
        ));
    }
}
