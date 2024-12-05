<?php

namespace Eurega\Backoffice\Application\Request\ProductoBackoffice;


final class ProductoBackofficeCreatorRequest {

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