<?php

declare(strict_types=1);

namespace Eurega\Shared\Application\Command;

class AccederUsuarioCommand
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
