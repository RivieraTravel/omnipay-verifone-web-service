<?php

namespace Autumndev\VerifoneWebService;

class NonSessionBasedGateway extends AbstractVerifoneGateway
{
    public function tokenRegistration(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\TokenRegistrationRequest',
            $parameters
        );
    }

    public function purchase(array $parameters = array())
    {
        $parameters['tokenRegistrationRequest'] = $this->tokenRegistration($parameters);
        $parameters['confirmRequest'] = $this->confirm($parameters);
        $parameters['rejectRequest'] = $this->reject($parameters);
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\PurchaseTransactionRequest',
            $parameters
        );
    }

    public function confirm(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\ConfirmRequest',
            $parameters
        );
    }

    public function reject(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\RejectRequest',
            $parameters
        );
    }

    public function refund(array $parameters = array())
    {
        $parameters['confirmRequest'] = $this->confirm($parameters);
        $parameters['rejectRequest'] = $this->reject($parameters);
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\RefundTransactionRequest',
            $parameters
        );
    }

    public function confirmRefundRequest(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\ConfirmRequest',
            $parameters
        );
    }

    public function rejectRefundRequest(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\NonSessionBased\RejectRequest',
            $parameters
        );
    }
}
