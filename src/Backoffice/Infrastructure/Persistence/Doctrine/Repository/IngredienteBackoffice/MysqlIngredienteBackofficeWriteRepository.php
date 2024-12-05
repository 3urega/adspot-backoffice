<?php

declare(strict_types=1);

namespace Eurega\Backoffice\Infrastructure\Persistence\Doctrine\Repository\ProductoBackoffice;

use Doctrine\ORM\EntityManagerInterface;
use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;
use Eurega\Backoffice\Domain\Repository\IngredienteBackoffice\IngredienteBackofficeWriteRepository;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Shared\Domain\ValueObject\Common\Id;


class MysqlIngredienteBackofficeWriteRepository implements IngredienteBackofficeWriteRepository
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    public function nextIdentity(): IdIngredienteBackoffice
    {
        return Id::generate();
    }

    public function save(IngredienteBackoffice $producto): void
    {
        $this->entityManager->persist($producto);
        $this->entityManager->flush();
    }
}
