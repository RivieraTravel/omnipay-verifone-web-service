<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Autumndev\VerifoneWebService\Message\RejectResponse;
use Omnipay\Common\Message\RequestInterface;

class RejectRequest extends AbstractRemoteRequest
{
    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'VGREJECTIONREQUEST';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        return '<?xml version="1.0"?>
<vgrejectionrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="VANGUARD"
>
<sessionguid>'.$this->getSessionGuid().'</sessionguid>
<transactionid>'.$this->getTransactionId().'</transactionid>
<capturemethod>'.$this->getCapturemethod().'</capturemethod>
</vgrejectionrequest>';
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new RejectResponse($request, $response);
    }

    public function setCapturemethod($value)
    {
        return $this->setParameter('capturemethod', $value);
    }

    public function getCapturemethod()
    {
        return $this->getParameter('capturemethod');
    }

    public function setCsc($value)
    {
        return $this->setParameter('csc', $value);
    }

    public function getCsc()
    {
        return $this->getParameter('Csc');
    }

    public function setAvshouse($value)
    {
        return $this->setParameter('avshouse', $value);
    }

    public function getAvshouse()
    {
        return $this->getParameter('avshouse');
    }

    public function setAvspostcode($value)
    {
        return $this->setParameter('avspostcode', $value);
    }

    public function getAvspostcode()
    {
        return $this->getParameter('avspostcode');
    }
}
