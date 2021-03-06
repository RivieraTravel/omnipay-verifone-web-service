<?php

namespace Autumndev\VerifoneWebService\Message\Objects\ProcessMsg;

use Autumndev\VerifoneWebService\Message\Objects\ProcessMsg\Message\ClientHeader;

class Message
{
    /**
     * @var ClientHeader
     */
    private $ClientHeader;
    /**
     * @var string
     */
    private $MsgType;
    /**
     * @var string
     */
    private $MsgData;

    /**
     * Message constructor.
     * @param ClientHeader $ClientHeader
     * @param string $MsgType
     * @param string $MsgData
     */
    public function __construct(
        ClientHeader $ClientHeader,
        $MsgType,
        $MsgData
    ) {
        $this->ClientHeader = $ClientHeader;
        $this->MsgType = $MsgType;
        $this->MsgData = $MsgData;
    }

    /**
     * @return string
     */
    public function getMsgType()
    {
        return $this->MsgType;
    }

    public function getMsgData()
    {
        return $this->MsgData;
    }

    /**
     * @param string $attributeName
     * @return string
     */
    public function getMsgDataAttribute($attributeName)
    {
        // In an ideal world, we would cache this value in the class, but the problem is it would then get sent
        // in all the messages, which we don't want to do.
        $MsgDataAsObject = simplexml_load_string($this->MsgData, 'SimpleXMLElement', LIBXML_NOWARNING);

        return (string) $MsgDataAsObject->$attributeName;
    }

    /**
     * @param string $attributeName
     * @return string|null
     */
    public function getClientHeaderAttribute($attributeName)
    {
        return $this->ClientHeader->getAttribute($attributeName);
    }
}
