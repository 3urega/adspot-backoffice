<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Domain\Repository\IngredienteBackoffice;

use Eurega\Backoffice\Domain\Exception\IngredienteBackoffice\IngredienteBackofficeAlreadyExistException;
use Eurega\Backoffice\Domain\Exception\IngredienteBackoffice\IngredienteBackofficeNameNotFoundException;
use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;
use Eurega\Shared\Domain\Aggregate\AggregateRoot;
use Eurega\Shared\Domain\ValueObject\Repository\Limit;
use Eurega\Shared\Domain\ValueObject\Repository\OrderBy;

interface IngredienteBackofficeReadRepository {

    /** @throws IngredienteBackofficeAlreadyExistException */
    public function ofNombreAndFail(NombreIngredienteBackoffice $nombre): void;

    /** @throws IngredienteBackofficeNameNotFoundException */
    public function ofNombreOrFail(NombreIngredienteBackoffice $nombre): IngredienteBackoffice;

    public function search(IdIngredienteBackoffice $id): ?AggregateRoot;

    public function searchFiltered(
        ?Limit $limit,
        ?OrderBy $orderBy,
        array $filters
    ): array;
}
