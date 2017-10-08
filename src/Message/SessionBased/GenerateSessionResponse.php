<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class GenerateSessionResponse extends AbstractRemoteResponse
{
    /**
     * Return the error message
     *
     * @return string
     */
    public function getError()
    {
        return $this->getErrorByErrorCode();
    }
}
