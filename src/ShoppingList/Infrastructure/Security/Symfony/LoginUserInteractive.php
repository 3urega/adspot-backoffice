<?php

namespace Eurega\ShoppingList\Infrastructure\Security\Symfony;

use Eurega\ShoppingList\Domain\Repository\UsuarioParticular\UsuarioParticularReadRepository;
use Eurega\Shared\Domain\ValueObject\Common\Id;
use Eurega\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;
use Eurega\Shared\Infrastructure\Symfony\Security\Usuario\SfUsuarioParticular;
use Eurega\ShoppingList\Domain\Event\UsuarioParticular\UsuarioParticularLoginDomainEvent;
use Symfony\Bundle\SecurityBundle\Security;

// TODO: hacer la interfaz de dominio
final class LoginUserInteractive {

    public function __construct(
        private InMemorySymfonyEventBus $eventBus,
        private Security $security,
        private UsuarioParticularReadRepository $usuarioReadRepository
    ) { }

    public function doLogin(string $user_id) {

        $domain_user = $this->usuarioReadRepository->ofIdOrFail(
            Id::fromString($user_id)
        );

        $usuario = SfUsuarioParticular::fromDomainModel($domain_user);
        
        $this->security->login($usuario);

        $this->eventBus->publish(new UsuarioParticularLoginDomainEvent(
            $domain_user->id()->asString(), 
            $domain_user->direccionEmail()->asString())
        );
    }
}


// // if the firewall has more than one authenticator, you must pass it explicitly
//         // by using the name of built-in authenticators...
//         $security->login($user, 'form_login');
//         // ...or the service id of custom authenticators
//         $security->login($user, ExampleAuthenticator::class);

//         // you can also log in on a different firewall...
//         $security->login($user, 'form_login', 'other_firewall');

//         // ...and add badges
//         $security->login($user, 'form_login', 'other_firewall', [(new RememberMeBadge())->enable()]);

//         // use the redirection logic applied to regular login
//         $redirectResponse = $security->login($user);
//         return $redirectResponse;

//         // or use a custom redirection logic (e.g. redirect users to their account page)
//         // return new RedirectResponse('...');