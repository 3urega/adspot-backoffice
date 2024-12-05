<?php

declare(strict_types=1);

namespace App\Backoffice\Frontend\Controller\Usuario\UsuarioParticular;

use App\Backoffice\Frontend\Request\Usuario\CrearUsuarioParticularRequest;
use Eurega\Shared\Infrastructure\Symfony\WebController;

use Symfony\Component\HttpFoundation\Response;

use Override;

final class CrearUsuarioParticularController extends WebController {
	

	public function __invoke(): Response
	{
		return $this->render(
                '@backoffice/Usuario/crear-usuario-particular.twig',
                [
                    'request' => CrearUsuarioParticularRequest::createEmpty()
                ]
        );
	}

	#[Override]
	protected function exceptions(): array
	{
		return [];
	}
}