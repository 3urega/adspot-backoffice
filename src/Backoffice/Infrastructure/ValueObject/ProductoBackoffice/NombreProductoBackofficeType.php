<?php

namespace Eurega\Backoffice\Infrastructure\ValueObject\ProductoBackoffice;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use Eurega\Shared\Domain\ValueObject\Common\Nombre;

final class NombreProductoBackofficeType extends StringType
{
    /** @var string */
    public const TYPE_NAME = 'vo_nombre';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value instanceof Nombre) {
            return $value;
        }

        return parent::convertToDatabaseValue($value->asString(), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }

        return Nombre::fromString(parent::convertToPHPValue($value, $platform));
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function getName(): string
    {
        return self::TYPE_NAME;
    }
}