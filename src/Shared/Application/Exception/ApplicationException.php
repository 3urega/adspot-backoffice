<?php

namespace Eurega\Shared\Application\Exception;

abstract class ApplicationException extends \Exception{ 

    protected $code;

    public function __construct(string $code) {
        parent::__construct('');

        $this->code = $code;
    }

    public function code() {
        return $this->code;
    }
}