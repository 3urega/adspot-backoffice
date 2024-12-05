<?php

namespace App\Backoffice\Frontend\Controller\Usuario\UsuarioParticular;


use App\Backoffice\Frontend\Request\Usuario\CrearUsuarioParticularRequest;

use Eurega\Backoffice\Application\Exception\ApplicationException;
use Eurega\Backoffice\Domain\SuccessCodes;
use Eurega\Shared\Application\Command\Usuario\UsuarioParticular\CrearUsuarioParticularCommand;
use Eurega\Shared\Domain\Exception\DomainException;

use Eurega\Shared\Infrastructure\Symfony\WebController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Throwable;
use Override;


class SubmitCrearUsuarioParticularController extends WebController {


	public function __invoke(
        #[MapRequestPayload()] CrearUsuarioParticularRequest $request
    ): Response {
        
        if ($request->isValid()) {
            try {
                
                $this->handle(
                    new CrearUsuarioParticularCommand(
                        $request->email,
                        $request->password,
                        $request->nombre
                    )
                );
                
                $this->addSingleSuccessFlashFor(SuccessCodes::$codes['USUARIO']['CREATED'] );
                $request = CrearUsuarioParticularRequest::createEmpty();
                
            } catch (DomainException|ApplicationException $e) {
                // El canal de error deberia ser 'error' en lugar de 'danger'
                $this->addFlashFor('danger',[$e->getMessage()]);

            } catch (Throwable $exception) {
                throw $exception;
                $this->addFlashFor('danger',['Ha ocurrido un error del sistema, contacte con el webmaster.']);
            }

        } 

        return $this->render(
            '@backoffice/Usuario/crear-usuario-particular.twig',
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