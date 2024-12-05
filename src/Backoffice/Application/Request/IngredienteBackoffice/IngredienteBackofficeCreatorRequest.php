<?php

namespace Eurega\Backoffice\Application\Request\IngredienteBackoffice;


final class IngredienteBackofficeCreatorRequest {

    public function __construct(
        private string $id,
        private string $nombre
    ) {}

    public function id(){
        return $this->id;
    }

    public function nombre(){
        return $this->nombre;
    }
}