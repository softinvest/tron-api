<?php

/**
 * GeneralSubtrees
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
 * GeneralSubtrees
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class GeneralSubtrees
{
    public const MAP = [
        'type' => ASN1::TYPE_SEQUENCE,
        'min' => 1,
        'max' => -1,
        'children' => GeneralSubtree::MAP,
    ];
}
