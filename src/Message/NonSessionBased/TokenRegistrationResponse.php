<?php

namespace Autumndev\VerifoneWebService\Message\NonSessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class TokenRegistrationResponse extends AbstractRemoteResponse
{
    /**
     * Return the error message
     *
     * @return string
     */
    public function getError()
    {
        $msgType = $this->data->getMsgType();

        return $msgType == 'TOKENRESPONSE' ? null : 'Your transaction was unsuccessful. Please try again';
    }

    public function getTokenId()
    {
        return $this->data->getMsgDataAttribute('tokenid');
    }
}
