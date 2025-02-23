<?php

declare(strict_types=1);

namespace Tests\Shared\Domain\Criteria;

use Eurega\Shared\Domain\Criteria\Filter;
use Eurega\Shared\Domain\Criteria\Filters;

final class FiltersMother
{
	/** @param Filter[] $filters */
	public static function create(array $filters): Filters
	{
		return new Filters($filters);
	}

	public static function createOne(Filter $filter): Filters
	{
		return self::create([$filter]);
	}

	public static function blank(): Filters
	{
		return self::create([]);
	}
}
