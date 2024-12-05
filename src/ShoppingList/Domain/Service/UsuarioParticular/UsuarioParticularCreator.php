<?php

namespace Eurega\ShoppingList\Domain\Service\UsuarioParticular;

use Eurega\Shared\Domain\Bus\Event\EventBus;
use Eurega\Shared\Domain\Exception\Usuario\UsuarioAlreadyExistException;
use Eurega\Shared\Domain\Exception\Usuario\UsuarioCannotCreateException;
use Eurega\Shared\Domain\ValueObject\Common\EmailAddress;
use Eurega\Shared\Domain\ValueObject\Common\Id;
use Eurega\Shared\Domain\ValueObject\Common\Nombre;
use Eurega\Shared\Domain\ValueObject\Security\PasswordHash;

use Eurega\ShoppingList\Domain\Request\UsuarioParticular\UsuarioParticularCreatorRequest;
use Eurega\ShoppingList\Domain\Repository\UsuarioParticular\UsuarioParticularReadRepository;
use Eurega\ShoppingList\Domain\Model\UsuarioParticular\UsuarioParticular;

use Throwable;

final class UsuarioParticularCreator {

    public function __construct(
        private  $writeRepository,
        private UsuarioParticularReadRepository $readRepository,
        private EventBus $eventBus   
    ) { }

    public function create(UsuarioParticularCreatorRequest $request) {

        $userEmail = EmailAddress::fromString($request->email());
        $userPassword = PasswordHash::fromString($request->password());
        $userName = Nombre::fromStringOrNull($request->nombre());
        $id = Id::generate();

        try {
            $this->readRepository->ofDireccionEmailAndFail($userEmail);
        } catch (UsuarioAlreadyExistException $e) {
            throw UsuarioCannotCreateException::becauseUsuarioWithEmailAlreadyExist();
        }

        $nuevoUsuario = UsuarioParticular::crear(
            $id,
            $userEmail,
            $userPassword,
            $userName
        );

// var_dump($nuevoUsuario); die;

        $this->writeRepository->save($nuevoUsuario);

        $this->eventBus->publish(...$nuevoUsuario->pullDomainEvents());
    }
}