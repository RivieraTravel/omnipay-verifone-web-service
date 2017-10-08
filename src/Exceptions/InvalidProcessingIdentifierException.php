<?php

namespace Autumndev\VerifoneWebService\Exceptions;

use Autumndev\VerifoneWebService\Exceptions\BaseException;

use \Exception;

class InvalidProcessingIdentifierException extends BaseException {
    /**
     * constructor
     *
     * redefined to enforce message and code to be required.
     *
     * @param string          $message
     * @param integer         $code
     * @param Exception|null  $previous
     */
    public function __construct($class) {
        // make sure everything is assigned properly
        parent::__construct($apiMessage.': Invalid Process Identifier provided.');
    }
}