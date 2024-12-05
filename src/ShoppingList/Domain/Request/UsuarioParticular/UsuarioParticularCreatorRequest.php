<?php

namespace Eurega\ShoppingList\Domain\Request\UsuarioParticular;


final class UsuarioParticularCreatorRequest {

    public function __construct(
        private string $email,
        private string $password,
        private string $nombre
    ) {}

    public function nombre(){
        return $this->nombre;
    }

    public function email(){
        return $this->email;
    }

    public function password(){
        return $this->password;
    }
}