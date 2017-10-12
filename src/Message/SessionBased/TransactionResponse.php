<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class TransactionResponse extends AbstractRemoteResponse
{
    protected $tokenId;

    /**
     * Return the error message
     *
     * @return string
     */
    public function getError()
    {
        return $this->getErrorByAuthCode();
    }

    public function getTransactionId()
    {
        return $this->data->getMsgDataAttribute('transactionid');
    }

    public function getMessage()
    {
        return $this->data->getMsgDataAttribute('authmessage');
    }

    public function getTransactionReference()
    {
        return json_encode([
            'transactionId' => $this->getTransactionId(),
            'tokenId' => $this->getTokenId()
        ]);
    }

    public function getAuthCode()
    {
        return $this->data->getMsgDataAttribute('authcode');
    }

    public function setTokenId($value)
    {
        $this->tokenId = $value;
    }

    public function getTokenId()
    {
        return (string) $this->tokenId;
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

    public function getVgisReference() {
        return $this->data->getMsgDataAttribute('vgisreference');
    }
    public function getCustomerSpecificHash() {
        return $this->data->getMsgDataAttribute('customerspecifichash');
    }
    public function getPanStar() {
        return $this->data->getMsgDataAttribute('panstar');
    }
    public function gethash() {
        return $this->data->getMsgDataAttribute('gdethash');
    }
}
