<?php

namespace Autumndev\VerifoneWebService\Message;

class RejectResponse extends AbstractRemoteResponse
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
