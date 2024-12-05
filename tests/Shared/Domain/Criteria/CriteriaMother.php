<?php

declare(strict_types=1);

namespace Tests\Shared\Domain\Criteria;

use Eurega\Shared\Domain\Criteria\Criteria;
use Eurega\Shared\Domain\Criteria\Filters;
use Eurega\Shared\Domain\Criteria\Order;

final class CriteriaMother
{
	public static function create(
		Filters $filters,
		Order $order = null,
		int $offset = null,
		int $limit = null
	): Criteria {
		return new Criteria($filters, $order ?: OrderMother::none(), $offset, $limit);
	}

	public static function empty(): Criteria
	{
		return self::create(FiltersMother::blank(), OrderMother::none());
	}
}
