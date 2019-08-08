<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Omnipay\Common\Message\RequestInterface;
use Autumndev\VerifoneWebService\Exceptions\InvalidProcessingIdentifierException;
use Autumndev\VerifoneWebService\Exceptions\InvalidTxTypeException;

class TransactionRequest extends AbstractRemoteRequest
{
    const TX_PURCHASE              = '01';
    const TX_REFUND                = '02';
    const TX_CASH_ADVANCE          = '04';
    const TX_PWCB                  = '05';
    const TX_CONTINUOUS_AUTHORITY  = '06';
    const TX_ACCOUNT_CHECK         = '07';

    const PI_AUTH_CHARGE    = 1;
    const PI_AUTH           = 2;
    const PI_CHARGE         = 3;


    protected $hasPaAuxData = false;

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
<transactioncurrencycode>'.$this->getTransactionCurrencyCode().'</transactioncurrencycode>
<apacsterminalcapabilities>'.$this->getApacsterminalcapabilities().'</apacsterminalcapabilities>
<capturemethod>'.$this->getCapturemethod().'</capturemethod>
<processingidentifier>'.$this->getProcessingidentifier().'</processingidentifier>
<avshouse>'.$this->getHouse().'</avshouse>
<avspostcode>'.str_replace(' ', '', $this->getPostcodeDigits()).'</avspostcode>
<txnvalue>'.$this->getAmount().'</txnvalue>
<terminalcountrycode>'.$this->getTerminalCountryCode().'</terminalcountrycode>
'.$this->getPaAuxData().'
<accountpasscode>'.$this->getAccountPasscode().'</accountpasscode>
<returnhash>'.$this->getReturnhash().'</returnhash>
</vgtransactionrequest>';
    }


    protected function getPaAuxData()
    {
        //return '';


        if ($this->hasPaAuxData()) {
            return '<payerauthauxiliarydata>
<authenticationstatus>'.$this->getAuthenticationStatus().'</authenticationstatus>
<authenticationcavv>'.$this->getAuthenticationCAVV().'</authenticationcavv>
<authenticationeci>'.$this->getAuthenticationECI().'</authenticationeci>
<atsdata>'.$this->getAtsData().'</atsdata>
<transactionid>'.$this->getPaTransactionId().'</transactionid>
</payerauthauxiliarydata>';
        } else {
            return '';
        }
    }


    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new TransactionResponse($request, $response);
    }

    public function setHouse($value)
    {
        return $this->setParameter('house', $value);
    }

    public function getHouse()
    {
        return preg_replace('/[^\d]/', '', $this->getParameter('house'));
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
        return $this->getParameter('apacsterminalcapabilities');
    }

    public function setApacsterminalcapabilities($value = '4298')
    {
        return $this->setParameter('apacsterminalcapabilities', $value);
    }

    public function getCapturemethod()
    {
        return '12';
    }

    public function setCapturemethod($value = '12')
    {
        return $this->setParameter('capturemethod', $value);
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

        return $this->setParameter('processingidentifier', $value);
    }

    public function getProcessingidentifier()
    {
        return $this->getParameter('processingidentifier');
    }

    public function getReturnhash()
    {
        return '0';
    }

    public function getTerminalCountryCode() {
        return $this->getParameter('terminalcountrycode');
    }

    public function setTerminalCountryCode($value) {
        return $this->setParameter('terminalcountrycode', $value);
    }

    public function getTransactionCurrencyCode() {
        return $this->getParameter('transactioncurrencycode');
    }

    public function setTransactionCurrencyCode($value) {
        return $this->setParameter('transactioncurrencycode', $value);
    }


    protected function hasPaAuxData() {
        return $this->hasPaAuxData;
    }
    protected function setHasPaAuxData($value) {
        return $this->hasPaAuxData = $value;
    }

    public function getAuthenticationStatus() {
        return $this->getParameter('authenticationstatus');
    }
    public function setAuthenticationStatus($value) {
        $this->setHasPaAuxData(true);
        return $this->setParameter('authenticationstatus', $value);
    }

    public function getAuthenticationCAVV() {
        return $this->getParameter('authenticationcavv');
    }
    public function setAuthenticationCAVV($value) {
        $this->setHasPaAuxData(true);
        return $this->setParameter('authenticationcavv', $value);
    }

    public function getAuthenticationECI() {
        return $this->getParameter('authenticationeci');
    }
    public function setAuthenticationECI($value) {
        $this->setHasPaAuxData(true);
        return $this->setParameter('authenticationeci', $value);
    }

    public function getAtsData() {
        return $this->getParameter('atsdata');
    }
    public function setAtsData($value) {
        $this->setHasPaAuxData(true);
        return $this->setParameter('atsdata', $value);
    }

    public function getPaTransactionId() {
        return $this->getParameter('patransactionid');
    }
    public function setPaTransactionId($value) {
        $this->setHasPaAuxData(true);
        return $this->setParameter('patransactionid', $value);
    }


}
