<?php

/**
 * DH Parameters
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

declare(strict_types=1);

namespace SoftInvest\TronAPI\PhpSecLib3\Crypt\DH;

use SoftInvest\TronAPI\PhpSecLib3\Crypt\DH;

/**
 * DH Parameters
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
final class Parameters extends DH
{
    /**
     * Returns the parameters
     *
     * @param array $options optional
     */
    public function toString(string $type = 'PKCS1', array $options = []): string
    {
        $type = self::validatePlugin('Keys', 'PKCS1', 'saveParameters');

        return $type::saveParameters($this->prime, $this->base, $options);
    }
}
