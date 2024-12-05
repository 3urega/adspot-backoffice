<?php

declare(strict_types=1);

namespace App\ShoppingList\Backend\Controller\Auth;

use Eurega\Backoffice\Application\Response\ProductoBackoffice\ProductoBackofficeSearcherResponse;
use Eurega\Shared\Domain\Bus\Command\CommandBusRead;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AuthController
{

    public function __construct(
        private CommandBusRead $commandBusRead
        // private Auth $authFirebase
    ) { }

    public function __invoke(Request $request): JsonResponse
    {

        // $this->authFirebase->verifyIdToken();
        $uid = $request->attributes->get('authenticated_user');

        $webResponse = new JsonResponse(
            [
                'start' => 'hola' . $uid,
                200,
                ['Access-Control-Allow-Origin' => '*']
            ]
        );

        // $hash = md5((string)$filtered);

        // $webResponse->setEtag($hash);
        // $response->setExpires((new DateTime())->modify('+15 days'));

        return $webResponse;
    }

    /**
     * @return string[]
     */
    protected function formatData(ProductoBackofficeSearcherResponse $producto): array
    {
        return [
            'id' => $producto->id()->asString(),
            'nombre' => $producto->nombre()->asString()
        ];
    }
}
