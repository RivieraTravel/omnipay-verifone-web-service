<?php

namespace Autumndev\VerifoneWebService\Message\NonSessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteRequest;
use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;
use Autumndev\VerifoneWebService\Message\ConfirmResponse;
use Omnipay\Common\Message\RequestInterface;

class ConfirmRequest extends AbstractRemoteRequest
{
    /**
     * @return string
     */
    public function getMsgType()
    {
        return 'CNF';
    }

    /**
     * @return string
     */
    public function getMsgData()
    {
        // Note: Some of the optional elements have been omitted.
        // If added back in, make sure they're not populated for refunds.
        return '<?xml version="1.0"?>
<confirmationrequest
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns="TXN"
>
<transactionid>'.$this->getTransactionId().'</transactionid>
</confirmationrequest>';
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

    public function setTransactionId($value)
    {
        return $this->setParameter('transactionId', $value);
    }

    public function getTransactionId()
    {
        return $this->getParameter('transactionId');
    }
}
