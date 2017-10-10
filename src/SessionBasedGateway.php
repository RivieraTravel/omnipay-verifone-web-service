<?php

namespace Autumndev\VerifoneWebService;

class SessionBasedGateway extends AbstractVerifoneGateway
{
    public function getCardFormPostUrl()
    {
        return ($this->getTestMode() ? $this->testCardFormPostUrl : $this->liveCardFormPostUrl);
    }

    public function generateSession(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\SessionBased\GenerateSessionRequest',
            $parameters
        );
    }

    public function getCardDetails(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\SessionBased\GetCardDetailsRequest',
            $parameters
        );
    }

    public function tokenRegistration(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\SessionBased\TokenRegistrationRequest',
            $parameters
        );
    }

    public function transaction(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\SessionBased\TransactionRequest',
            $parameters
        );
    }

    public function confirm(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\SessionBased\ConfirmRequest',
            $parameters
        );
    }

    public function reject(array $parameters = array())
    {
        return $this->createRequest(
            '\Autumndev\VerifoneWebService\Message\SessionBased\RejectRequest',
            $parameters
        );
    }

    public function refund(array $parameters = array())
    {
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
