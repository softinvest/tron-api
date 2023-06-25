<?php

/**
 * PuTTY Formatted EC Key Handler
 *
 * PHP version 5
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

declare(strict_types=1);

namespace SoftInvest\TronAPI\PhpSecLib3\Crypt\EC\Formats\Keys;

use SoftInvest\TronAPI\PhpSecLib3\Common\Functions\Strings;
use SoftInvest\TronAPI\PhpSecLib3\Crypt\Common\Formats\Keys\PuTTY as Progenitor;
use SoftInvest\TronAPI\PhpSecLib3\Crypt\EC\BaseCurves\Base as BaseCurve;
use SoftInvest\TronAPI\PhpSecLib3\Crypt\EC\BaseCurves\TwistedEdwards as TwistedEdwardsCurve;
use SoftInvest\TronAPI\PhpSecLib3\Exception\RuntimeException;
use SoftInvest\TronAPI\PhpSecLib3\Math\BigInteger;
use SoftInvest\TronAPI\PhpSecLib3\Math\Common\FiniteField;
use SoftInvest\TronAPI\PhpSecLib3\Math\Common\FiniteField\Integer;

/**
 * PuTTY Formatted EC Key Handler
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class PuTTY extends Progenitor
{
    use Common;

    /**
     * Public Handler
     *
     * @var string
     */
    public const PUBLIC_HANDLER = 'PhpSecLib3\Crypt\EC\Formats\Keys\OpenSSH';

    /**
     * Supported Key Types
     *
     * @var array
     */
    protected static $types = [
        'ecdsa-sha2-nistp256',
        'ecdsa-sha2-nistp384',
        'ecdsa-sha2-nistp521',
        'ssh-ed25519',
    ];

    /**
     * Break a public or private key down into its constituent components
     *
     * @param string|array $key
     * @param string|false $password
     * @return array|false
     */
    public static function load($key, $password)
    {
        $components = parent::load($key, $password);
        if (!isset($components['private'])) {
            return $components;
        }

        $private = $components['private'];

        $temp = Strings::base64_encode(Strings::packSSH2('s', $components['type']) . $components['public']);
        $components = OpenSSH::load($components['type'] . ' ' . $temp . ' ' . $components['comment']);

        if ($components['curve'] instanceof TwistedEdwardsCurve) {
            if (Strings::shift($private, 4) != "\0\0\0\x20") {
                throw new RuntimeException('Length of ssh-ed25519 key should be 32');
            }
            $arr = $components['curve']->extractSecret($private);
            $components['dA'] = $arr['dA'];
            $components['secret'] = $arr['secret'];
        } else {
            [$components['dA']] = Strings::unpackSSH2('i', $private);
            $components['curve']->rangeCheck($components['dA']);
        }

        return $components;
    }

    /**
     * Convert a private key to the appropriate format.
     *
     * @param Integer[] $publicKey
     */
    public static function savePrivateKey(BigInteger $privateKey, BaseCurve $curve, array $publicKey, ?string $secret = null, ?string $password = null, array $options = []): string
    {
        self::initialize_static_variables();

        $public = explode(' ', OpenSSH::savePublicKey($curve, $publicKey));
        $name = $public[0];
        $public = Strings::base64_decode($public[1]);
        [, $length] = unpack('N', Strings::shift($public, 4));
        Strings::shift($public, $length);

        // PuTTY pads private keys with a null byte per the following:
        // https://github.com/github/putty/blob/a3d14d77f566a41fc61dfdc5c2e0e384c9e6ae8b/sshecc.c#L1926
        if (!$curve instanceof TwistedEdwardsCurve) {
            $private = $privateKey->toBytes();
            if (!(strlen($privateKey->toBits()) & 7)) {
                $private = "\0$private";
            }
        }

        $private = $curve instanceof TwistedEdwardsCurve ?
            Strings::packSSH2('s', $secret) :
            Strings::packSSH2('s', $private);

        return self::wrapPrivateKey($public, $private, $name, $password, $options);
    }

    /**
     * Convert an EC public key to the appropriate format
     *
     * @param FiniteField[] $publicKey
     */
    public static function savePublicKey(BaseCurve $curve, array $publicKey): string
    {
        $public = explode(' ', OpenSSH::savePublicKey($curve, $publicKey));
        $type = $public[0];
        $public = Strings::base64_decode($public[1]);
        [, $length] = unpack('N', Strings::shift($public, 4));
        Strings::shift($public, $length);

        return self::wrapPublicKey($public, $type);
    }
}
