<?php
declare(strict_types=1);

namespace SoftInvest\TronAPI\Mdanter\Ecc\Serializer\Point;

use SoftInvest\TronAPI\Mdanter\Ecc\Primitives\PointInterface;
use SoftInvest\TronAPI\Mdanter\Ecc\Primitives\CurveFpInterface;

interface PointSerializerInterface
{
    /**
     *
     * @param  PointInterface $point
     * @return string
     */
    public function serialize(PointInterface $point): string;

    /**
     * @param  CurveFpInterface $curve  Curve that contains the serialized point
     * @param  string           $string
     * @return PointInterface
     */
    public function unserialize(CurveFpInterface $curve, string $string): PointInterface;
}
