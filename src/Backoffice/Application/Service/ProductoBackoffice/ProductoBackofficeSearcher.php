<?php

namespace Eurega\Backoffice\Application\Service\ProductoBackoffice;

use Eurega\Backoffice\Application\Response\ProductoBackoffice\ProductoBackofficeSearcherResponse;
use Eurega\Backoffice\Domain\Model\ProductoBackoffice\ProductoBackoffice;
use Eurega\Backoffice\Domain\Repository\ProductoBackoffice\ProductoBackofficeReadRepository;
use Eurega\Shared\Domain\ValueObject\Repository\Limit;
use Eurega\Shared\Domain\ValueObject\Repository\OrderBy;

use function Lambdish\Phunctional\map;

final class ProductoBackofficeSearcher {

    public function __construct(
        private ProductoBackofficeReadRepository $repository)
    { }
    
    /**
     * @return Array ProductoBackofficeSearcherResponse
     */
    public function __invoke(
        ?Limit $limit,
        ?OrderBy $orderBy,
        array $filters
    ): Array {

        
    $elements = map(
                $this->toResponse(), 
                $this->repository->searchFiltered(
                    $limit,
                    $orderBy,
                    $filters
                )
            );
    
    return $elements;
    }

    private function toResponse(): callable
    {
        return static function (ProductoBackoffice $producto) {
            return new ProductoBackofficeSearcherResponse(
                $producto->id(), 
                $producto->nombre()
            );
        };
    }
}