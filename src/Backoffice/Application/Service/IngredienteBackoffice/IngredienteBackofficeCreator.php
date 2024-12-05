<?php

namespace Eurega\Backoffice\Application\Service\IngredienteBackoffice;

use Eurega\Backoffice\Application\Request\IngredienteBackoffice\IngredienteBackofficeCreatorRequest;
use Eurega\Backoffice\Domain\Exception\IngredienteBackoffice\IngredienteBackofficeAlreadyExistException;
use Eurega\Backoffice\Domain\Exception\IngredienteBackoffice\IngredienteBackofficeCannotCreateException;
use Eurega\Backoffice\Domain\Model\IngredienteBackoffice\IngredienteBackoffice;

use Eurega\Backoffice\Domain\Repository\IngredienteBackoffice\IngredienteBackofficeReadRepository;
use Eurega\Backoffice\Domain\Repository\IngredienteBackoffice\IngredienteBackofficeWriteRepository;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\IdIngredienteBackoffice;
use Eurega\Backoffice\Domain\ValueObject\IngredienteBackoffice\NombreIngredienteBackoffice;
use Eurega\Shared\Domain\Bus\Event\EventBus;

final class IngredienteBackofficeCreator {

    public function __construct(
        private IngredienteBackofficeWriteRepository $writeRepository,
        private IngredienteBackofficeReadRepository $readRepository,
        private EventBus $eventBus   
    ) { }

    public function __invoke( IngredienteBackofficeCreatorRequest $request ) {
        
        $nombre = NombreIngredienteBackoffice::fromString($request->nombre());
        $id = IdIngredienteBackoffice::fromString($request->id());

        try {

            $this->readRepository->ofNombreAndFail($nombre);

        } catch (IngredienteBackofficeAlreadyExistException $e) {
            
            throw new IngredienteBackofficeCannotCreateException();
        }

        $nuevoIngrediente = IngredienteBackoffice::crear(
            $id,
            $nombre
        );

        $this->writeRepository->save($nuevoIngrediente);

        $this->eventBus->publish(...$nuevoIngrediente->pullDomainEvents());

    }

}