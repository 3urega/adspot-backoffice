<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Modules\Usuario;

use Eurega\Shared\Application\Command\Usuario\UsuarioAdministrador\CrearUsuarioAdministradorCommand;
use Eurega\Shared\Domain\ValueObject\Common\EmailAddress;
use Eurega\Shared\Domain\ValueObject\Common\Nombre;
use Eurega\Shared\Infrastructure\PhpUnit\WordMother;

final class CrearUsuarioAdministradorCommandMother
{
	public static function create(
		?Nombre $nombre = null,
		?EmailAddress $email = null
	): CrearUsuarioAdministradorCommand {
		return new CrearUsuarioAdministradorCommand(
			$nombre?->asString() ?? WordMother::create(),
			$email?->asString() ?? "user@email.com"
		);
	}
}