<?php

namespace Eurega\Backoffice\Application\Collection\ProductoBackoffice;

use Eurega\Backoffice\Application\Response\ProductoBackoffice\ProductoBackofficeSearcherResponse;
use Eurega\Shared\Domain\Collection;
use Webmozart\Assert\Assert;

/**
 * Estos dto que terminan con la palabra "response" se usan para devolver datos estructurados desde un repositorio a un controlador
 */
final class ProductoBackofficeSearcherResponseCollection extends Collection
{
    /**
     *
     * @throws InvalidArgumentException
     */
    public static function fromElements(array $elements): self
    {
        Assert::allIsInstanceOf($elements, ProductoBackofficeSearcherResponse::class);

        $collection = new self();

        $collection->items = $elements;

        return $collection;
    }

    public function addElement($element): void
    {
        Assert::isInstanceOf($element, ProductoBackofficeSearcherResponse::class);

        $this->items[] = $element;
    }

    public static function createEmpty(): self
    {
        return new self();
    }

    public function first(): ProductoBackofficeSearcherResponse
    {
        return $this->items[0];
    }

    /*
    public function getIterator(): Traversable
    {
        yield from $this->elements;
    }
    */

    function type(): string {
        return ProductoBackofficeSearcherResponse::class;
    }
}