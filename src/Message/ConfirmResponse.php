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

    public function getAuthCode()
    {
        return $this->data->getMsgDataAttribute('authcode');
    }

    public function getMerchantReference()
    {
        return $this->data->getMsgDataAttribute('merchantreference');
    }

    public function getResultDateTimeString()
    {
        return $this->data->getMsgDataAttribute('resultdatetimestring');
    }

    public function getMerchantNumber()
    {
        return $this->data->getMsgDataAttribute('merchantnumber');
    }

    public function getTerminalId()
    {
        return $this->data->getMsgDataAttribute('tid');
    }

    public function getSchemeName() {
        return $this->data->getMsgDataAttribute('schemename');
    }

    public function getMessageNumber()
    {
        return $this->data->getMsgDataAttribute('messagenumber');
    }

    public function getVrTelephone()
    {
        return $this->data->getMsgDataAttribute('vrtel');
    }

    public function getTxnResult()
    {
        return $this->data->getMsgDataAttribute('txnresult');
    }

    public function getPcavsResult() {
        return $this->data->getMsgDataAttribute('pcavsresult');
    }

    public function getAd1avsresult()
    {
        return $this->data->getMsgDataAttribute('ad1avsresult');
    }

    public function getCvcResult()
    {
        return $this->data->getMsgDataAttribute('cvcresult');
    }

    public function getArc() {
        return $this->data->getMsgDataAttribute('arc');
    }

    public function getAuthorSignentity() {
        return $this->data->getMsgDataAttribute('authorisingentity');
    }
}
