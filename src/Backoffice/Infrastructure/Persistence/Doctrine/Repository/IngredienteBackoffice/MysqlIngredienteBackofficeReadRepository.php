<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Infrastructure\Persistence\Doctrine\Repository\IngredienteBackoffice;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Eurega\Backoffice\Domain\Exception\IngredienteBackoffice\IngredienteBackofficeAlreadyExistException;
use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Backoffice\Domain\Repository\IngredienteBackoffice\IngredienteBackofficeReadRepository;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;
use Eurega\Backoffice\Infrastructure\Persistence\Doctrine\QueryBuilder\IngredienteBackofficeQueryBuilder;
use Eurega\Backoffice\Infrastructure\Persistence\Doctrine\ValueObject\IngredienteBackoffice\IdIngredienteBackofficeType;
use Eurega\Backoffice\Infrastructure\Persistence\Doctrine\ValueObject\IngredienteBackoffice\NombreIngredienteBackofficeType;

use Eurega\Shared\Domain\ValueObject\Ingrediente\IdIngrediente;
use Eurega\Shared\Domain\ValueObject\Repository\Limit;
use Eurega\Shared\Domain\ValueObject\Repository\OrderBy;

class MysqlIngredienteBackofficeReadRepository implements IngredienteBackofficeReadRepository {

    public function __construct(
		private readonly IngredienteBackofficeQueryBuilder $queryBuilder
	) {}

    public function ofIdOrFail(IdIngrediente $id): IngredienteBackoffice
    {
        $qb = $this->queryBuilder->__invoke();

        $qb->where(
                'ingrediente.id = :id'
            )
            ->setParameter('id', $id, IdIngredienteBackofficeType::TYPE_NAME);

        try {
            return $qb
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException | NonUniqueResultException $e) {
           throw $e;
        }
    }

    public function ofNombreOrFail(NombreIngredienteBackoffice $nombre): IngredienteBackoffice {

        $qb = $this->queryBuilder->__invoke();

        $qb->where(
                'producto.nombre = :nombre'
            )
            ->setParameter('nombre', $nombre, NombreIngredienteBackofficeType::TYPE_NAME);

        $result = $qb->getQuery()->getSingleResult();

        if ($result === 0) {
            return null;
        }
        
        return $result;
    }

    public function ofNombreAndFail(NombreIngredienteBackoffice $nombre): void {

        $qb = $this->queryBuilder->__invoke();

        $qb->where(
                'ingrediente.nombre = :nombre'
            )
            ->setParameter('nombre', $nombre, NombreIngredienteBackofficeType::TYPE_NAME);
            
        $result = $qb->getQuery()->getOneOrNullResult();
        
        if($result === null) return;

        throw new IngredienteBackofficeAlreadyExistException() ;
    }

    public function search(
        IdIngredienteBackoffice $id
    ): ?IngredienteBackoffice {
		$qb = $this->queryBuilder->__invoke();
        $qb->where(
            'ingrediente.id = :id'
        )
        ->setParameter('id', $id, IdIngredienteBackofficeType::TYPE_NAME);
        return $qb->getQuery()->getResult();
	}

    public function searchFiltered(
        ?Limit $limit,
        ?OrderBy $orderBy,
        array $filters
    ): array {
        $qb = $this->queryBuilder->__invoke(
            $filters,
            $limit,
            $orderBy
        );

		return $qb->getQuery()->getResult();
	}

}
