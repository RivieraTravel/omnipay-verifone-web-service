<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Omnipay\Common\Message\RequestInterface;
use Autumndev\VerifoneWebService\Exceptions\InvalidProcessingIdentifierException;
use Autumndev\VerifoneWebService\Exceptions\InvalidTxTypeException;

class PurchaseRequest extends AbstractRemoteRequest
{
    const TX_PURCHASE              = 1;
    const TX_REFUND                = 2;
    const TX_CASH_ADVANCE          = 4;
    const TX_PWCB                  = 5;
    const TX_CONTINUOUS_AUTHORITY  = 6;
    const TX_ACCOUNT_CHECK         = 7;

    const PI_AUTH_CHARGE    = 1;
    const PI_AUTH           = 2;
    const PI_CHARGE         = 3;

    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'VGTRANSACTIONREQUEST';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        return '<?xml version="1.0"?>
<vgtransactionrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="VANGUARD"
>
<sessionguid>'.$this->getSessionGuid().'</sessionguid>
<merchantreference>'.$this->getTransactionId().'</merchantreference>
<accountid>'.$this->getAccountId().'</accountid>
<txntype>'.$this->getTxntype().'</txntype>
<transactioncurrencycode>'.$this->getCurrencyNumeric().'</transactioncurrencycode>
<apacsterminalcapabilities>'.$this->getApacsterminalcapabilities().'</apacsterminalcapabilities>
<capturemethod>'.$this->getCapturemethod().'</capturemethod>
<processingidentifier>'.$this->getProcessingidentifier().'</processingidentifier>
<avshouse>'.$this->getHouse().'</avshouse>
<avspostcode>'.str_replace(' ', '', $this->getPostcodeDigits()).'</avspostcode>
<txnvalue>'.$this->getAmount().'</txnvalue>
<terminalcountrycode>'.$this->getCurrencyNumeric().'</terminalcountrycode>
<accountpasscode>'.$this->getAccountPasscode().'</accountpasscode>
<returnhash>'.$this->getReturnhash().'</returnhash>
</vgtransactionrequest>';
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new PurchaseResponse($request, $response);
    }

    public function setHouse($value)
    {
        return $this->setParameter('house', $value);
    }

    public function getHouse()
    {
        return $this->getParameter('house');
    }

    public function setPostcode($value)
    {
        return $this->setParameter('postcode', $value);
    }

    public function getPostcode()
    {
        return $this->getParameter('postcode');
    }

    public function getPostcodeDigits()
    {
        // Remove anything in the postcode that is not a digit, and return the result.
        return preg_replace('/[^\d]/', '', $this->getPostcode());
    }

    public function setAccountPasscode($value)
    {
        return $this->setParameter('accountPasscode', $value);
    }

    public function getAccountPasscode()
    {
        return $this->getParameter('accountPasscode');
    }

    public function setTxntype($value = self::TX_PURCHASE)
    {
        $validValues = [
            self::TX_PURCHASE,
            self::TX_REFUND,
            self::TX_CASH_ADVANCE,
            self::TX_PWCB,
            self::TX_CONTINUOUS_AUTHORITY,
            self::TX_ACCOUNT_CHECK,
        ];

        if (!in_array($value, $validValues)) {
            throw new InvalidTxTypeException(__CLASS__);
        }

        return $this->setParameter('txntype', $value);
    }

    public function getTxntype()
    {
        return $this->getParameter('txntype');
    }

    public function getApacsterminalcapabilities()
    {
        return '4298';
    }

    public function getCapturemethod()
    {
        return '12';
    }

    public function setProcessingidentifier($value = self::PI_AUTH_CHARGE)
    {
        $validValues = [
            self::PI_AUTH_CHARGE,
            self::PI_AUTH,
            self::PI_CHARGE,
        ];

        if (!in_array($value, $validValues)) {
            throw new InvalidProcessingIdentifierException(__CLASS__);
        }

        return $this->setParameter('processingIdentifier', $value);
    }

    public function getProcessingidentifier()
    {
        return $this->getParameter('processingIdentifier');
    }

    public function getReturnhash()
    {
        return '0';
    }
}
