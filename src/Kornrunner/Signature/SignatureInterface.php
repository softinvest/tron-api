<?php declare(strict_types=1);

namespace SoftInvest\TronAPI\Kornrunner\Signature;

use SoftInvest\TronAPI\Mdanter\Ecc\Crypto\Signature\SignatureInterface as EccSignatureInterface;

interface SignatureInterface extends EccSignatureInterface {
    public function getRecoveryParam(): int;
}
