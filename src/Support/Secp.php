<?php

declare(strict_types=1);

namespace SoftInvest\TronAPI\Support;

use SoftInvest\TronAPI\Kornrunner\Secp256k1;
use SoftInvest\TronAPI\Kornrunner\Signature\Signature;

class Secp
{
    public static function sign(string $message, string $privateKey): string
    {
        $secp = new Secp256k1();

        /** @var Signature $sign */
        $sign = $secp->sign($message, $privateKey, ['canonical' => false]);

        return $sign->toHex() . bin2hex(implode('', array_map('chr', [$sign->getRecoveryParam()])));
    }
}
