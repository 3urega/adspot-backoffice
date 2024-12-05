<?php

namespace Eurega\Backoffice\Application\Service\ProductoBackoffice;

use Eurega\Backoffice\Application\Request\ProductoBackoffice\ProductoBackofficeCreatorRequest;
use Eurega\Backoffice\Domain\Exception\ProductoBackoffice\ProductoBackofficeAlreadyExistException;
use Eurega\Backoffice\Domain\Exception\ProductoBackoffice\ProductoBackofficeCannotCreateException;
use Eurega\Backoffice\Domain\Model\ProductoBackoffice\ProductoBackoffice;
use Eurega\Backoffice\Domain\Repository\ProductoBackoffice\ProductoBackofficeReadRepository;
use Eurega\Backoffice\Domain\Repository\ProductoBackoffice\ProductoBackofficeWriteRepository;
use Eurega\Shared\Domain\Bus\Event\EventBus;

use Eurega\Shared\Domain\ValueObject\Common\Id;
use Eurega\Shared\Domain\ValueObject\Common\Nombre;

final class ProductoBackofficeCreator {

    public function __construct(
        private ProductoBackofficeWriteRepository $writeRepository,
        private ProductoBackofficeReadRepository $readRepository,
        private EventBus $eventBus   
    ) { }

    /**
     * @throws ProductoBackofficeCannotCreateException
     */
    public function __invoke( ProductoBackofficeCreatorRequest $request ) {
        
        $nombre = Nombre::fromString($request->nombre());
        $id = Id::fromString($request->id());

        try {

            $this->readRepository->ofNombreAndFail($nombre);

        } catch (ProductoBackofficeAlreadyExistException $e) {
            
            throw ProductoBackofficeCannotCreateException::becauseNombreAlreadyExists();
        }

        $nuevoProducto = ProductoBackoffice::crear(
            $id,
            $nombre
        );

        $this->writeRepository->save($nuevoProducto);

        $this->eventBus->publish(...$nuevoProducto->pullDomainEvents());

    }

}