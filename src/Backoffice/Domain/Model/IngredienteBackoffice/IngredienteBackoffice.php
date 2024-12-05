<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Domain\Model\IngredienteBackoffice;

use Doctrine\ORM\PersistentCollection;
use Eurega\Backoffice\Domain\Event\IngredienteBackoffice\IngredienteBackofficeCreated;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;
use Eurega\Shared\Domain\Aggregate\AggregateRoot;

final class IngredienteBackoffice extends AggregateRoot {

    protected NombreIngredienteBackoffice $nombre;

    protected IdIngredienteBackoffice $id;

    protected PersistentCollection $productos;

    private function __construct(
        IdIngredienteBackoffice $id,
        NombreIngredienteBackoffice $nombre
    ) {
        $this->id              = $id;
        $this->nombre          = $nombre;
    }

    public static function crear(
        IdIngredienteBackoffice $id,
        NombreIngredienteBackoffice $nombre
    ): self {
        $nuevo_ingrediente_backoffice = new self(
            $id,
            $nombre
        );

        $nuevo_ingrediente_backoffice->record(
            new IngredienteBackofficeCreated(
                $id->asString(), 
                $nombre->asString()
            )
        );

        return $nuevo_ingrediente_backoffice;
    }

    public function toPrimitives(): array
    {
        return [
            "id" => $this->id->asString(),
            "nombre" => $this->nombre?->asString()
        ];
    }

    public function nombre(): NombreIngredienteBackoffice {
        return $this->nombre;
    }

    public function id(): IdIngredienteBackoffice {
        return $this->id;
    }

    public function productos(): PersistentCollection {
        return $this->productos;
    }

}