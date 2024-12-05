<?php

namespace Eurega\Shared\Infrastructure\Firebase\Auth;

use Eurega\Shared\Domain\Auth\VerifyToken;
use Kreait\Firebase\Auth\UserRecord;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class VerifyFirebaseToken implements VerifyToken {


    public function __construct(private Auth $auth){ }

    public function verify(string $idToken): string
    {
        // El token debe estar en el formato: "Bearer <token>"
		$token = str_replace('Bearer ', '', $idToken);

        try {
            // Verifica el token

// @TODO verifiToken issue
            // ======  ESTO NO FUNCIONA EN LOCAL  ========
            // $verifiedIdToken = $this->auth->verifyIdToken($token);
            // $uid = $verifiedIdToken->claims()->get('sub');
            // $user = $this->auth->getUser($uid);

            // @TODO verifiToken issue
            return '';
        } catch (FailedToVerifyToken $e) {
            // Si el token no es válido, retorna null
            return null;
        }
    }
}