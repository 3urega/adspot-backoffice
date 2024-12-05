<?php
declare(strict_types=1);

namespace Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice;

use Eurega\Shared\Domain\Exception\ValueObject\IdIsNotValid;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class IdIngredienteBackoffice extends Uuid implements UuidInterface {
    private string $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public function serialize(): string
    {
        return $this->id;
    }

    public static function generate(): self
    {
        return new self(
            Uuid::uuid4()->toString()
        );
    }

    /**
     * @throws IdIsNotValid
     */
    public static function fromString(string $stringId): self
    {
        $stringId = trim($stringId);

        if ('' === $stringId) {
            throw IdIsNotValid::becauseStringIsEmpty();
        }

        if (!Uuid::isValid($stringId)) {
            throw IdIsNotValid::becauseStringIsInvalid($stringId);
        }

        return new self($stringId);
    }

    /**
     * @throws IdIsNotValid
     */
    public static function fromStringOrNull(?string $id): ?self
    {
        if ($id === null || $id === '') {
            return null;
        }

        return self::fromString($id);
    }

    public function asString(): string
    {
        return $this->id;
    }

    public function equalsTo(IdIngredienteBackoffice $anotherId): bool
    {
        return $this->id === $anotherId->id;
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}