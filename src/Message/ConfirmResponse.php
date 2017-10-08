<?php

namespace Autumndev\VerifoneWebService\Message;

class ConfirmResponse extends AbstractRemoteResponse
{
    /**
     * Return the error message
     *
     * @return string
     */
    public function getError()
    {
        return null;
    }
}
