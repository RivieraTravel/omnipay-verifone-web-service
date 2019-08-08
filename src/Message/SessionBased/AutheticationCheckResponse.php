<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class AutheticationCheckResponse extends AbstractRemoteResponse
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
    public function getPayerAuthAtsData()
    {
        return $this->data->getMsgDataAttribute('atsdata');
    }
    public function getPayerAuthStatus()
    {
        return $this->data->getMsgDataAttribute('authenticationstatus');
    }

    public function getPayerAuthCert()
    {
        return $this->data->getMsgDataAttribute('authenticationcertificate');
    }
    public function getPayerAuthCAVV()
    {
        return $this->data->getMsgDataAttribute('authenticationcavv');
    }
    public function getPayerAuthECI()
    {
        return $this->data->getMsgDataAttribute('authenticationeci');
    }
    public function getPayerAuthDateTimeString()
    {
        return $this->data->getMsgDataAttribute('authenticationtime');
    }



}
