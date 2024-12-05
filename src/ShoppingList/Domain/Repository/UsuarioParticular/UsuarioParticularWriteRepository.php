<?php

declare(strict_types=1);

namespace Eurega\ShoppingList\Domain\Repository\UsuarioParticular;

use Eurega\ShoppingList\Domain\Model\UsuarioParticular\UsuarioParticular;
use Eurega\Shared\Domain\ValueObject\Common\Id;

interface UsuarioParticularWriteRepository 
{
    public function nextIdentity(): Id;

    public function save(UsuarioParticular $usuario): void;
}
