<?php

namespace Autumndev\VerifoneWebService\Message;

use Autumndev\VerifoneWebService\Message\Objects\ProcessMsg;
use Autumndev\VerifoneWebService\Message\Objects\ProcessMsg\Message;
use Autumndev\VerifoneWebService\Message\Objects\ProcessMsg\Message\ClientHeader;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Autumndev\VerifoneWebService\Exceptions\UnexpectedValueException;

/**
 * Verifone Web Service Purchase Request
 */
abstract class AbstractRemoteRequest extends AbstractRequest
{
    protected $liveEndpoint = 'https://payment.cxmlpg.com/XML4/commideagateway.asmx';
    protected $testEndpoint = 'https://txn-cst.cxmlpg.com/XML4/commideagateway.asmx';

    protected function getEndpoint($withWsdl = false)
    {
        if (!is_bool($withWsdl)) {
            throw new UnexpectedValueException(__CLASS__);
        }
        return ($this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint) . ($withWsdl ? '?WSDL' : '');
    }

    /**
     * @return string
     */
    abstract public function getMsgType();

    /**
     * @return string
     */
    abstract public function getMsgData();

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    abstract protected function buildResponse($request, $response);

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

    public function getAccountId()
    {
        return $this->getParameter('accountId');
    }

    public function setAccountId($value)
    {
        return $this->setParameter('accountId', $value);
    }

    /**
     * @return ProcessMsg
     */
    public function getData()
    {
        $this->validate('systemId', 'systemGuid', 'passcode');

        $data = new ProcessMsg(
            new Message(
                new ClientHeader(
                    $this->getSystemId(),
                    $this->getSystemGuid(),
                    $this->getPasscode(),
                    empty($this->getProcessingDb()) ? '' : $this->getProcessingDb(),
                    1,
                    false
                ),
                $this->getMsgType(),
                $this->getMsgData()
            )
        );

        return $data;
    }

    /**
     * @param ProcessMsg $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|Response
     */
    public function sendData($data)
    {
        $processMessage = new \SOAPClient($this->getEndpoint(true));
        $response = $processMessage->__soapCall('ProcessMsg', ['ProcessMsg' => $data]);

        return $this->response = $this->buildResponse($this, $response);
    }

    public function getSessionGuid()
    {
        return $this->getParameter('sessionGuid');
    }

    public function setSessionGuid($value)
    {
        return $this->setParameter('sessionGuid', $value);
    }

    public function getProcessingDb()
    {
        return $this->getParameter('processingDb');
    }

    public function setProcessingDb($value)
    {
        return $this->setParameter('processingDb', $value);
    }
}
