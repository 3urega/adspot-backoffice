<?php

namespace Eurega\Backoffice\Infrastructure\Persistence\Doctrine\QueryBuilder;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Shared\Domain\ValueObject\Repository\Limit;
use Eurega\Shared\Domain\ValueObject\Repository\OrderBy;

class IngredienteBackofficeQueryBuilder
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function __invoke(
        array $filters = [],
        ?Limit $limit = null,
        ?OrderBy $orderBy = null
        ): QueryBuilder
    {

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('ingrediente')
            ->from(IngredienteBackoffice::class, 'ingrediente');

        if ($limit !== null && $limit->hasLimit()) {
            $qb->setMaxResults($limit->limit());
        }

        if ($limit !== null && $limit->hasOffset()) {
            $qb->setFirstResult($limit->offset());
        }

        if ($orderBy !== null && ! $orderBy->isEmpty()) {
            foreach ($orderBy->fields() as $field) {
                $qb->addOrderBy(
                    sprintf('ingrediente.%s', $field->name()),
                    $field->direction()
                );
            }
        }


        if (array_key_exists('nombre', $filters)) {
            $qb
                ->where('ingrediente.nombre LIKE  :nombre')
                ->setParameter('nombre', "%".$filters['nombre']."%");
        }

        return $qb;
    }
}