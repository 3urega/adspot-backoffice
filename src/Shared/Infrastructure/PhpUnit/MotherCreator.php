<?php

declare(strict_types=1);

namespace Eurega\Shared\Infrastructure\PhpUnit;

use Faker\Factory;
use Faker\Generator;

final class MotherCreator
{
	private static ?Generator $faker = null;

	public static function random(): Generator
	{
		return self::$faker ??= Factory::create();
	}
}
