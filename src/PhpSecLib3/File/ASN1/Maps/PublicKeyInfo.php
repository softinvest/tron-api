<?php

/**
 * PublicKeyInfo
 *
 * PHP version 5
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

declare(strict_types=1);

namespace SoftInvest\TronAPI\PhpSecLib3\File\ASN1\Maps;

use SoftInvest\TronAPI\PhpSecLib3\File\ASN1;

/**
 * PublicKeyInfo
 *
 * this format is not formally defined anywhere but is none-the-less the form you
 * get when you do "openssl rsa -in private.pem -outform PEM -pubout"
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class PublicKeyInfo
{
    public const MAP = [
        'type' => ASN1::TYPE_SEQUENCE,
        'children' => [
            'publicKeyAlgorithm' => AlgorithmIdentifier::MAP,
            'publicKey' => ['type' => ASN1::TYPE_BIT_STRING],
        ],
    ];
}