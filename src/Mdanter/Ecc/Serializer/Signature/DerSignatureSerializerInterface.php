<?php

declare(strict_types=1);

namespace SoftInvest\TronAPI\Mdanter\Ecc\Serializer\Signature;

use SoftInvest\TronAPI\Mdanter\Ecc\Crypto\Signature\SignatureInterface;

interface DerSignatureSerializerInterface
{
    /**
     * @param SignatureInterface $signature
     * @return string
     */
    public function serialize(SignatureInterface $signature): string;

    /**
     * @param string $binary
     * @return SignatureInterface
     * @throws \SoftInvest\TronAPI\FG\ASN1\Exception\ParserException
     */
    public function parse(string $binary): SignatureInterface;
}
