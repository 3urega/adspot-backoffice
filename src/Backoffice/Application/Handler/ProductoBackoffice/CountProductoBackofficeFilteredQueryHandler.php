<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Application\Handler\ProductoBackoffice;

use Eurega\Backoffice\Application\Collection\ProductoBackoffice\ProductoBackofficeCollection;
use Eurega\Backoffice\Application\Query\ProductoBackoffice\CountProductoBackofficeFilteredQuery;
use Eurega\Backoffice\Application\Service\ProductoBackoffice\ProductoBackofficeSearcher;
use Eurega\Shared\Domain\Bus\Query\QueryHandler;
use Eurega\Shared\Infrastructure\ValueObject\Common\Cantidad;

final readonly class CountProductoBackofficeFilteredQueryHandler implements QueryHandler
{
	public function __construct(
		private ProductoBackofficeSearcher $searcher
	) {}

	public function handle(
		CountProductoBackofficeFilteredQuery $query
	): Cantidad {

		$elements = $this->searcher->__invoke(
			null,
			null,
			$query->filters
		);

		$collection = ProductoBackofficeCollection::fromElements($elements);

		return Cantidad::fromIntOrNull($collection->count());
	}
}
