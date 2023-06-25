<?php

/**
 * PrivateDomainName
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
 * PrivateDomainName
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class PrivateDomainName
{
    public const MAP = [
        'type' => ASN1::TYPE_CHOICE,
        'children' => [
            'numeric' => ['type' => ASN1::TYPE_NUMERIC_STRING],
            'printable' => ['type' => ASN1::TYPE_PRINTABLE_STRING],
        ],
    ];
}