<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Omnipay\Common\Message\RequestInterface;

class AutheticationCheckRequest extends AbstractRemoteRequest
{
    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'VGPAYERAUTHAUTHENTICATIONCHECKREQUEST';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        return '<?xml version="1.0"?>
<vgpayerauthauthenticationcheckrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="VANGUARD"
>
<sessionguid>'.$this->getSessionGuid().'</sessionguid>
<merchantreference>'.$this->getTransactionId().'</merchantreference>
<payerauthrequestid>'.$this->getPayerAuthResquestId().'</payerauthrequestid>
<pares>'.$this->getPARes().'</pares>
<enrolled>'.$this->getEnrolled().'</enrolled>
</vgpayerauthauthenticationcheckrequest>';
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new AutheticationCheckResponse($request, $response);
    }

    public function getPayerAuthResquestId()
    {
        return $this->getParameter('payerauthrequestid');
    }
    public function setPayerAuthRequestId($value)
    {
        return $this->setParameter('payerauthrequestid',$value);
    }


    public function getPARes()
    {
        return $this->getParameter('pares');
    }
    public function setPARes($value)
    {
        return $this->setParameter('pares',$value);
    }

    public function getEnrolled()
    {
        return $this->getParameter('enrolled');
    }
    public function setEnrolled($value)
    {
        return $this->setParameter('enrolled',$value);
    }
}
