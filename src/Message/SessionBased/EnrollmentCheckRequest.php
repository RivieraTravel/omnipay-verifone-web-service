<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Omnipay\Common\Message\RequestInterface;

class EnrollmentCheckRequest extends AbstractRemoteRequest
{
    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'VGPAYERAUTHENROLLMENTCHECKREQUEST';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        return '<?xml version="1.0"?>
<vgpayerauthenrollmentcheckrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="VANGUARD">
<sessionguid>'.$this->getSessionGuid().'</sessionguid>
<merchantreference>'.$this->getTransactionId().'</merchantreference>
<mkaccountid>'.$this->getAccountId().'</mkaccountid>
<mkacquirerid>'.$this->getAcquirerId().'</mkacquirerid>
<merchantname>'.$this->getMerchantName().'</merchantname>
<merchantcountrycode>'.$this->getTerminalCountryCode().'</merchantcountrycode>
<merchanturl>'.$this->getMerchantURL().'</merchanturl>
<visamerchantbankid>'.$this->getVisaMerchantBankId().'</visamerchantbankid>
<visamerchantnumber>'.$this->getVisaMerchantNumber().'</visamerchantnumber>
<mcmmerchantbankid>'.$this->getMCMMerchantBankId().'</mcmmerchantbankid>
<mcmmerchantnumber>'.$this->getMCMMerchantNumber().'</mcmmerchantnumber>
<currencycode>'.$this->getTransactionCurrencyCode().'</currencycode>
<currencyexponent>'.$this->getCurrencyDecimalPlaces().'</currencyexponent>
<browseracceptheader>'.$this->getBrowserAcceptHeader().'</browseracceptheader>
<browseruseragentheader>'.$this->getBrowserUseragentHeader().'</browseruseragentheader>
<transactionamount>'.$this->getAmountInteger().'</transactionamount>
<transactiondisplayamount>'.$this->getAmount().'</transactiondisplayamount>
<transactiondescription>'.$this->getDescription().'</transactiondescription>
</vgpayerauthenrollmentcheckrequest>';
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new EnrollmentCheckResponse($request, $response);
    }

    public function getAcquirerId()
    {
        return $this->getParameter('acquirerid');
    }
    public function setAcquirerId($value)
    {
        return $this->setParameter('acquirerid',$value);
    }

    public function getMerchantName()
    {
        return $this->getParameter('merchantname');
    }
    public function setMerchantName($value)
    {
        return $this->setParameter('merchantname',$value);
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


    public function getMerchantURL()
    {
         return $this->getParameter('merchanturl');
    }
    public function setMerchantURL($value)
    {
         return $this->setParameter('merchanturl', $value);
    }

    public function getVisaMerchantBankId()
    {
         return $this->getParameter('visamerchantbankid');
    }
    public function setVisaMerchantBankId($value)
    {
         return $this->setParameter('visamerchantbankid',$value);
    }

    public function getVisaMerchantNumber()
    {
         return $this->getParameter('visamerchantnumber');
    }
    public function setVisaMerchantNumber($value)
    {
         return $this->setParameter('visamerchantnumber',$value);
    }

    public function getMCMMerchantBankId()
    {
         return $this->getParameter('mcmmerchantbankid');
    }
    public function setMCMMerchantBankId($value)
    {
         return $this->setParameter('mcmmerchantbankid',$value);
    }

    public function getMCMMerchantNumber()
    {
         return $this->getParameter('mcmmerchantnumber');
    }
    public function setMCMMerchantNumber($value)
    {
         return $this->setParameter('mcmmerchantnumber',$value);
    }

    public function getBrowserAcceptHeader()
    {
         return $this->getParameter('browseracceptheader');
    }
    public function setBrowserAcceptHeader($value)
    {
         return $this->setParameter('browseracceptheader',$value);
    }

    public function getBrowserUseragentHeader()
    {
         return $this->getParameter('browseruseragentheader');
    }
    public function setBrowserUseragentHeader($value)
    {
         return $this->setParameter('browseruseragentheader',$value);
    }
}
