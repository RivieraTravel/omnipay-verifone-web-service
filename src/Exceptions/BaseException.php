<?php

namespace Autumndev\VerifoneWebService\Exceptions;

use \Exception;

class BaseException extends Exception {
    /**
     * constructor
     *
     * redefined to enforce message and code to be required.
     *
     * @param string          $message
     * @param integer         $code
     * @param Exception|null  $previous
     */
    public function __construct($message, $code, Exception $previous = null) {
        // make sure everything is assigned properly
        parent::__construct($message, (int) $code, $previous);
    }
}