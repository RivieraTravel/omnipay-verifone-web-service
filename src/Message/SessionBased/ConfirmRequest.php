<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\ConfirmResponse;
use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Omnipay\Common\Message\RequestInterface;

class ConfirmRequest extends AbstractRemoteRequest
{
    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'VGCONFIRMATIONREQUEST';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        return '<?xml version="1.0"?>
<vgconfirmationrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="VANGUARD"
>
<sessionguid>'.$this->getSessionGuid().'</sessionguid>
<transactionid>'.$this->getTransactionId().'</transactionid>
</vgconfirmationrequest>';
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    protected function buildResponse($request, $response)
    {
        return new ConfirmResponse($request, $response);
    }
}
