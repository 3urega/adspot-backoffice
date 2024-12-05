<?php
namespace Eurega\ShoppingList\Application\Command\UsuarioParticular;

class AuthenticateUsuarioParticularCommand {

    public function __construct(
        private string $uid
    ) {}

    public function uid() {
        return $this->uid;
    }
}