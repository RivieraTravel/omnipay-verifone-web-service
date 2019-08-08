<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class EnrollmentCheckResponse extends AbstractRemoteResponse
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

    public function getPayerAuthRequestId()
    {
        return $this->data->getMsgDataAttribute('payerauthrequestid');
    }
    public function getPayerAuthEnrolled()
    {
        return $this->data->getMsgDataAttribute('enrolled');
    }
    public function getPayerAuthAcsURL()
    {
        return $this->data->getMsgDataAttribute('acsurl');
    }
    public function getPayerAuthReq()
    {
        return $this->data->getMsgDataAttribute('pareq');
    }
}
