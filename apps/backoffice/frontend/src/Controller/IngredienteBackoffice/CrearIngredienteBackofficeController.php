<?php

declare(strict_types=1);

namespace App\Backoffice\Frontend\Controller\IngredienteBackoffice;

use App\Backoffice\Frontend\Request\IngredienteBackoffice\CrearIngredienteBackofficeRequest;
use Eurega\Shared\Infrastructure\Symfony\WebController;

use Symfony\Component\HttpFoundation\Response;

use Override;

final class CrearIngredienteBackofficeController extends WebController {
	

	public function __invoke(): Response
	{
		return $this->render(
                '@backoffice/IngredienteBackoffice/crear-ingrediente-backoffice.twig',
                [
                    'request' => CrearIngredienteBackofficeRequest::createEmpty()
                ]
        );
	}

	#[Override]
	protected function exceptions(): array
	{
		return [];
	}
}