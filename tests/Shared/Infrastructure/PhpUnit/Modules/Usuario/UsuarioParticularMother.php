<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario;

use Eurega\ShoppingList\Domain\Model\UsuarioParticular\UsuarioParticular;
use Eurega\Shared\Domain\ValueObject\Common\EmailAddress;
use Eurega\Shared\Domain\ValueObject\Common\Id;
use Eurega\Shared\Domain\ValueObject\Common\Nombre;
use Eurega\Shared\Domain\ValueObject\Security\PasswordHash;
use Eurega\Shared\Infrastructure\PhpUnit\UuidMother;
use Eurega\Shared\Infrastructure\PhpUnit\WordMother;
use Tests\Shared\Infrastructure\PhpUnit\Mother\common\EmailMother;

final class UsuarioParticularMother
{
	public static function create(
    ): UsuarioParticular
	{
		return UsuarioParticular::crear(
            Id::fromString(UuidMother::create()),
            EmailAddress::fromString('user@email.com'),
            PasswordHash::generateRandom(),
            Nombre::fromString(WordMother::create())
        );
	}
}
