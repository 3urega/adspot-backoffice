<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Application\Handler\ProductoBackoffice;

use Eurega\Backoffice\Application\Collection\ProductoBackoffice\ProductoBackofficeSearcherResponseCollection;
use Eurega\Backoffice\Application\Query\ProductoBackoffice\SearchProductoBackofficeQuery;
use Eurega\Backoffice\Application\Service\ProductoBackoffice\ProductoBackofficeSearcher;
use Eurega\Shared\Domain\Bus\Query\QueryHandler;

final readonly class SearchProductoBackofficeQueryHandler implements QueryHandler
{
	public function __construct(
		private ProductoBackofficeSearcher $searcher
	) {}

	public function handle(
		SearchProductoBackofficeQuery $query
	): ProductoBackofficeSearcherResponseCollection {

		$elements =  $this->searcher->__invoke(
			$query->limit,
			$query->orderBy,
			$query->filters
		);

		$response = ProductoBackofficeSearcherResponseCollection::fromElements($elements);

		return $response;
	}
}
