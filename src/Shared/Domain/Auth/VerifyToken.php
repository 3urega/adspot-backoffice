<?php

namespace Eurega\Shared\Domain\Auth;

interface VerifyToken {
    public function verify(string $idToken): string;
}