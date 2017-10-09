<?php

namespace Autumndev\VerifoneWebService\Message\SessionBased;

use Autumndev\VerifoneWebService\Message\AbstractRemoteResponse;

class GetCardDetailsResponse extends AbstractRemoteResponse
{
    /**
     * Return the error message
     *
     * @return string
     */
    public function getError()
    {
        return $this->getErrorByErrorCode();
    }

    /**
     * Expiry date from customer’s post
     * Only returned if capture method was ‘full capture
     *
     * @return string
     */
    public function getExpiryDate()
    {
        return $this->data->getMsgDataAttribute('expirydate');
    }

    /**
     * Start date from customer’s post
     * Only returned if capture method was ‘full capture
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->data->getMsgDataAttribute('startdate');
    }
    /**
     * returns the card holder associated with the card details
     *
     * @return string
     */
    public function getCardHolder()
    {
        return $this->data->getMsgDataAttribute('cardholdername');
    }
    /**
     * returns the full capture setting used with the card details
     *
     * @return boolean
     */
    public function getFullCapture()
    {
        return (bool) $this->data->getMsgDataAttribute('fullcapture');
    }
    /**
     * returns MK Card scheme ID from the card details.
     *
     * @return decimal
     */
    public function getMkCardSchemeId()
    {
        return $this->data->getMsgDataAttribute('mkcardschemeid');
    }
    /**
     * returns the card scheme name
     *
     * @return string
     */
    public function getSchemeName()
    {
        return (float) $this->data->getMsgDataAttribute('schemename');
    }
    /**
     * returns the Length of issue number, if required
     *
     * @return integer
     */
    public function getIssueNoLength()
    {
        return (integer) $this->data->getMsgDataAttribute('issuenolength');
    }
    /**
     * Indicates if start date required
     *
     * @return boolean
     */
    public function getStartDateRequired()
    {
        return (bool) $this->data->getMsgDataAttribute('startdaterequired');
    }
    /**
     * Length of Card Security Code, if required
     *
     * @return string
     */
    public function getCscLength()
    {
        return $this->data->getMsgDataAttribute('csclength');
    }
    /**
     * Indicates if Payer Authentication is supported
     *
     * @return boolean
     */
    public function getAllowPayerAuth()
    {
        return (bool) $this->data->getMsgDataAttribute('allowpayerauth');
    }
    /**
     * gets the CPC option
     * Available Values:
     * 0 = Not CPC Card
     * 1 = CPC Card
     * 2 = Mask Identification Required
     *
     * @return integer
     */
    public function getCpcOption()
    {
        return (integer) $this->data->getMsgDataAttribute('cpcoption');
    }
    /**
     * Mask used to identify if the PAN matches the format of a CPC
     * card or not. Valid characters are:
     * _ = A single numeric digit
     * 0-9 = Specific numeric digit
     * % = Any combination of numeric digits
     *
     * @return string
     */
    public function getCpcIdentificationMask()
    {
        return $this->data->getMsgDataAttribute('cpcidentificationmask');
    }
    /**
     * Starred PAN - first 6, last 4
     *
     * @return string
     */
    public function getPanStar()
    {
        return $this->data->getMsgDataAttribute('panstar');
    }
    /**
     * SHA-256 hashed representation of the PAN
     *
     * @return string
     */
    public function getCardNumberHash()
    {
        return $this->data->getMsgDataAttribute('cardnumberhash');
    }
    /**
     * Issue no from customer’s post
     * Only returned if capture method was ‘full capture’
     *
     * @return string
     */
    public function getIssueNo()
    {
        return $this->data->getMsgDataAttribute('issueno');
    }
    /**
     * Cardholder’s billing address first line from customer’s post
     *
     * @return string
     */
    public function getAddressOne()
    {
        return $this->data->getMsgDataAttribute('address1');
    }
    /**
     * Cardholder’s billing address second line from customer’s post
     *
     * @return string
     */
    public function getAddressTwo()
    {
        return $this->data->getMsgDataAttribute('address2');
    }
    /**
     * Cardholder’s billing address town from customer’s post
     *
     * @return string
     */
    public function getTown()
    {
        return $this->data->getMsgDataAttribute('town');
    }
    /**
     * Cardholder’s billing address county from customer’s post
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->data->getMsgDataAttribute('county');
    }
    /**
     * Cardholder’s billing address postcode from customer’s post
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->data->getMsgDataAttribute('postcode');
    }
    /**
     * Cardholder’s billing address country from customer’s post
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->data->getMsgDataAttribute('country');
    }
}
