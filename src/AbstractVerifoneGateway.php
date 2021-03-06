<?php

namespace Autumndev\VerifoneWebService;

use Omnipay\Common\AbstractGateway;

abstract class AbstractVerifoneGateway extends AbstractGateway
{
    protected $liveCardFormPostUrl = 'https://vg-a.cxmlpg.com/vanguard.aspx';
    protected $testCardFormPostUrl = 'https://vg-cst.cxmlpg.com/vanguard.aspx';


    public function getName()
    {
        return 'Verifone (Web Service)';
    }

    public function getSystemId()
    {
        return $this->getParameter('systemId');
    }

    public function setSystemId($value)
    {
        return $this->setParameter('systemId', $value);
    }

    public function getSystemGuid()
    {
        return $this->getParameter('systemGuid');
    }

    public function setSystemGuid($value)
    {
        return $this->setParameter('systemGuid', $value);
    }

    public function getPasscode()
    {
        return $this->getParameter('passcode');
    }

    public function setPasscode($value)
    {
        return $this->setParameter('passcode', $value);
    }

    public function setProcessingDb($value)
    {
        return $this->setParameter('processingDb', $value);
    }

    public function getProcessingDb()
    {
        return $this->getParameter('processingDb');
    }
}
