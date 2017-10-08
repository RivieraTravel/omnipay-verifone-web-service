<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class GetCardDetailsResponse extends AbstractRemoteResponse
{
    const AS_YYMM = 'YYMM';
    /**
     * Return the error message
     *
     * @return string
     */
    public function getError()
    {
        return $this->getErrorByErrorCode();
    }

    public function getExpiryDate(string $format = null)
    {
        $expiryDate = $this->data->getMsgDataAttribute('expirydate');
        if ($format == self::AS_YYMM) {
            $expiryDate = substr($expiryDate, 2, 2).substr($expiryDate, 0, 2);
        }

        return $expiryDate;
    }
}
