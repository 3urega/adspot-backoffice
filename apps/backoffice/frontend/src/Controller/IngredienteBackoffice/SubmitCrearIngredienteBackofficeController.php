<?php

namespace App\Backoffice\Frontend\Controller\IngredienteBackoffice;

use App\Backoffice\Frontend\Request\IngredienteBackoffice\CrearIngredienteBackofficeRequest;
use Eurega\Backoffice\Application\Command\ProductoBackoffice\CreaProductoBackofficeCommand;
use Eurega\Backoffice\Application\Exception\ApplicationException;
use Eurega\Shared\Domain\Exception\DomainException;
use Eurega\Backoffice\Domain\SuccessCodes;
use Eurega\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Response;

use Throwable;
use Override;

use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

class SubmitCrearIngredienteBackofficeController extends WebController {


	public function __invoke(
        #[MapRequestPayload()] CrearIngredienteBackofficeRequest $request
    ): Response {
        
        if ($request->isValid()) {
            try {

                $this->handle(
                    new CreaProductoBackofficeCommand(
                        $request->nombre,
                        $request->id
                    )
                );
                
                $this->addSingleSuccessFlashFor(SuccessCodes::$codes['INGREDIENTE_BACKOFFICE']['CREATED'] );
                
            } catch (DomainException|ApplicationException $e) {
                // El canal de error deberia ser 'error' en lugar de 'danger'
                $this->addFlashFor('danger',[$e->getMessage()]);

            } catch (Throwable $exception) {
                throw $exception;
                $this->addFlashFor('danger',['Ha ocurrido un error del sistema, contacte con el webmaster.']);
            }

        } 

        return $this->render(
            '@backoffice/IngredienteBackoffice/crear-ingrediente-backoffice.twig',
            [
                'request' => $request
            ] );
	}

    #[Override]
	protected function exceptions(): array
	{
		return [];
	}
    
}