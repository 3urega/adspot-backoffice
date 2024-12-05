<?php
declare(strict_types=1);

namespace Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice;

use Eurega\Shared\Domain\Exception\ValueObject\NombreIsNotValid;

final class NombreIngredienteBackoffice { 
    public const MAX_LENGTH = 155;
    private string $nombre;

    private function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @throws NombreIsNotValid
     */
    public static function fromString(string $nombre): self
    {
        $nombre = trim($nombre);

        self::validate($nombre);

        return new self(
            $nombre
        );
    }

    /**
     * @throws NombreIsNotValid
     */
    public static function fromStringOrNull(?string $nombre): ?self
    {
        if (null === $nombre) {
            return null;
        }

        $nombre = trim($nombre);

        self::validate($nombre);

        return new self(
            $nombre
        );
    }

    public function asString(): string
    {
        return $this->nombre;
    }

    public function __toString(): string
    {
        return $this->nombre;
    }

    public function equalsTo(NombreIngredienteBackoffice $anotherNombre): bool
    {
        return $this->nombre === $anotherNombre->nombre;
    }

    /**
     * @throws NombreIsNotValid
     */
    private static function validate(string $nombre): void
    {
        if ('' === $nombre) {
            throw NombreIsNotValid::becauseStringIsEmpty();
        }

        if (mb_strlen($nombre) > self::MAX_LENGTH) {
            throw NombreIsNotValid::becauseStringLengthIsLargerThanLimit();
        }
    }
}