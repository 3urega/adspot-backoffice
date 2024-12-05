<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PhpUnit\Mother\common;

use Eurega\Shared\Infrastructure\PhpUnit\MotherCreator;

final class EmailMother
{
	public static function create(): string
	{
		return MotherCreator::random()->unique()->email();
	}
}
