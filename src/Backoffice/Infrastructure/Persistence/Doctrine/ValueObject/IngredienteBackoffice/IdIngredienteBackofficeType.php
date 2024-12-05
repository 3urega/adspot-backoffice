<?php

namespace Eurega\Backoffice\Infrastructure\Persistence\Doctrine\ValueObject\IngredienteBackoffice;


use Doctrine\DBAL\Platforms\AbstractPlatform;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Ramsey\Uuid\Doctrine\UuidType;
use Ramsey\Uuid\UuidInterface;

final class IdIngredienteBackofficeType extends UuidType
{
    /** @var string */
    public const TYPE_NAME = 'vo_id_ingrediente_backoffice';

    
    public function convertToPHPValue($value, AbstractPlatform $platform): null|UuidInterface
    {
        $id = parent::convertToPHPValue($value, $platform);

        return $id !== null ? IdIngredienteBackoffice::fromString($id->toString()) : null;
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