# omnipay-verifone-web-service
**Forked from digitickets/omnipay-verifone-web-service in order to add extra functionality**

**Verifone Web Service driver for the Omnipay PHP payment processing library**

Omnipay implementation of the Verifone (Commidea) Web Service payment gateway.

[![Build Status](https://travis-ci.org/digitickets/omnipay-verifone-web-service.png?branch=master)](https://travis-ci.org/digitickets/omnipay-verifone-web-service)
[![Latest Stable Version](https://poser.pugx.org/digitickets/omnipay-verifone-web-service/version.png)](https://packagist.org/packages/omnipay/verifone)
[![Total Downloads](https://poser.pugx.org/digitickets/omnipay-verifone-web-service/d/total.png)](https://packagist.org/packages/digitickets/omnipay-verifone-web-service)

This driver supports the remote Verifone Payment Gateway (Web Service). Payment information is sent and received via XML messages.

## Installation

**Important: Driver requires [PHP's Intl extension](http://php.net/manual/en/book.intl.php) to be installed.**

The Verifone Omnipay driver is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "autumndev/omnipay-verifone-web-service": "~1.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## What's Included

This driver was originally written to support Session-Based transactions (except for refunds, which are non session-based and were implemented). We then realised that Session-based didn't work for us, so Non Session-Based was implemented.

The driver registers a token when any purchase is made. This means repeat payments will be available on any payments, although actually making repeat payments is not yet implemented.

## What's Not Included

It does not currently support PAYERAUTH.

The Session-based code wasn't completely finished, although it does work as it is. Ideally the token registration and confirm/reject messages need to be handled inside the purchase/refund request classes.

## Basic Usage

This driver supports the following processes to handle transactions and refunds:

### Non Session-based

Purchase Request (Transaction Request) -> Purchase Response (plus confirm/reject request)

Refund Request (Transaction Request) -> Refund Response (plus confirm/reject request)

### Session-based

Generate Session Request -> Generate Session Response\
-> \<card form submission to Verifone>\
-> Get Card Details Request -> Get Card Details Response\
-> Token Registration Request -> Token Registration Response [optional step]\
-> Purchase Request -> Purchase Response\
Then one of:\
-> Confirm Request -> Confirm Response\
or\
-> Reject Request -> Reject Response

For general Omnipay usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay)
repository.

**Example Send Request**
```php
//build and config gateway
$gateway = Omnipay::create(
    '\Autumndev\VerifoneWebService\SessionBasedGateway'
);
$gateway->setTestMode(true);
$gateway->setPasscode($passcode);
$gateway->setSystemGuid($guid);
$gateway->setSystemId($systemId);
//build and configure request
$session = $gateway->generateSession([
    'returnurl' => 'SOME URL',
    'fullcapture' => true
]);
//send request, recieve response.
$response = $session->send();
```

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you believe you have found a bug in this driver, please report it using the [GitHub issue tracker](https://github.com/digitickets/omnipay-verifone-web-service/issues),
or better yet, fork the library and submit a pull request.
