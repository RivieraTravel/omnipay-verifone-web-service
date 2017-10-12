<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Omnipay\Common\Message\RequestInterface;

class TokenRegistrationRequest extends AbstractRemoteRequest
{
    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'VGTOKENREGISTRATIONREQUEST';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        return '<?xml version="1.0"?>
<vgtokenregistrationrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="VANGUARD"
>
<sessionguid>'.$this->getSessionGuid().'</sessionguid>
<merchantreference>'.$this->getTransactionId().'</merchantreference>
<expirydate>'.$this->getExpiryDate().'</expirydate>
<startdate>'.$this->getStartDate().'</startdate>
<issueno>'.$this->getIssueNumber().'</issueno>
<purchase>'.$this->getPurchase().'</purchase>
<refund>'.$this->getRefund().'</refund>
<cashback>'.$this->getCashback().'</cashback>
<tokenexpirationdate>'.$this->getTokenexpirationdate().'</tokenexpirationdate>
</vgtokenregistrationrequest>';
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new TokenRegistrationResponse($request, $response);
    }

    public function setExpiryDate($value)
    {
        return $this->setParameter('expirydate', $value);
    }

    public function getExpiryDate()
    {
        return $this->getParameter('expirydate');
    }

    public function setStartDate($value)
    {
        return $this->setParameter('startdate', $value);
    }

    public function getStartDate()
    {
        return $this->getParameter('startdate');
    }

    public function setIssueNumber($value)
    {
        return $this->setParameter('issuenumber', $value);
    }

    public function getIssueNumber()
    {
        return $this->getParameter('issuenumber');
    }

    public function setPurchase($value)
    {
        return $this->setParameter('purchase', $value);
    }

    public function getPurchase()
    {
        return $this->getParameter('purchase');
    }

    public function setRefund($value)
    {
        return $this->setParameter('refund', $value);
    }

    public function getRefund()
    {
        return $this->getParameter('refund');
    }

    public function setCashback($value)
    {
        return $this->setParameter('cashback', $value);
    }

    public function getCashback()
    {
        return $this->getParameter('cashback');
    }

    public function setTokenexpirationdate($value)
    {
        return $this->setParameter('tokenexpirationdate', $value);
    }

    public function getTokenexpirationdate()
    {
        return $this->getParameter('tokenexpirationdate');
    }
}
