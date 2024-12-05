<?php

namespace Eurega\Shared\Domain\Exception;

abstract class DomainException extends \Exception{ 

    protected $code;

    public function __construct(string $code) {
        parent::__construct('');

        $this->code = $code;
    }

    public function code() {
        return $this->code;
    }
}