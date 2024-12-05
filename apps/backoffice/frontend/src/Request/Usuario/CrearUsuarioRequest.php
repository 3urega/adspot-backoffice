<?php

declare(strict_types=1);

namespace App\Backoffice\Frontend\Request\Usuario;

use Eurega\Backoffice\Infrastructure\Validation\ProductoBackoffice\NombreIsValidConstraint;

use Eurega\Shared\Infrastructure\Symfony\Request\FrontendRequest;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

/**
 * @NombreIsValidConstraint(groups={"create"})
 */
abstract class CrearUsuarioRequest extends FrontendRequest
{
    
    /** @Assert\NotBlank(message="Campo nombre obligatorio", groups={"create", "edit"}) */
    public ?string $nombre;

    /** @Assert\NotBlank(message="Campo nombre obligatorio", groups={"create", "edit"}) */
    public ?string $email;

    /** @Assert\NotBlank(message="Campo nombre obligatorio", groups={"create", "edit"}) */
    public ?string $password;

    public ?string $id;

    public function __construct(
        ?string $nombre = '',
        ?string $email = '',
        ?string $id = '',
        ?string $password = ''
    ) {
        $this->nombre      = $nombre;
        $this->email       = $email;
        $this->id          = $id;
        $this->password    = $password;
        //$this->errors = Validation::createValidator()->validate([], new Assert\Collection([]));
    }

    public static function fromRequest(Request $request): CrearUsuarioRequest
    {
        return new static(
            trim($request->request->get('nombre')),
            trim($request->request->get('email')),
            $request->request->get('id'),
            $request->request->get('password')
        );
    }

    public final function getAllAsArray(): array
    {
        return array(
            "nombre" => $this->nombre,
            "email" => $this->email,
            "password" => $this->password
        );
    }

    public final function validateRequest(): void
    {
        $constraint = new Assert\Collection(
            [
                'nombre'    => [new Assert\NotBlank(), new Assert\Length(['min' => 5, 'max' => 110])],
                'email'     => [new Assert\NotBlank(),new Assert\Email(), new Assert\Length(['min' => 5, 'max' => 150])],
                'password'  => [new Assert\NotBlank(), new Assert\Length(['min' => 8, 'max' => 25])]
            ]
        );

        // new Assert\PasswordStrength()
        
        $input = $this->getAllAsArray();
        
        $validationErrors = Validation::createValidator()->validate($input, $constraint);
        
        foreach($validationErrors as $validationError) {
            $this->errors[str_replace(['[', ']'], ['', ''], $validationError->getPropertyPath())] = $validationError->getMessage();
		}
    }
}
