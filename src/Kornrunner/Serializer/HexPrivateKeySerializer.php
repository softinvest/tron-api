<?php declare(strict_types=1);

namespace SoftInvest\TronAPI\Kornrunner\Serializer;

use SoftInvest\TronAPI\Mdanter\Ecc\Crypto\Key\PrivateKeyInterface;
use SoftInvest\TronAPI\Mdanter\Ecc\Primitives\GeneratorPoint;
use SoftInvest\TronAPI\Mdanter\Ecc\Serializer\PrivateKey\PrivateKeySerializerInterface;

class HexPrivateKeySerializer implements PrivateKeySerializerInterface
{
    protected $generator;

    public function __construct(GeneratorPoint $generator) {
        $this->generator = $generator;
    }

    public function serialize(PrivateKeyInterface $key): string {
        return gmp_strval($key->getSecret(), 16);
    }

    public function parse(string $formattedKey): PrivateKeyInterface {
        $key = gmp_init($formattedKey, 16);

        return $this->generator->getPrivateKeyFrom($key);
    }
}
