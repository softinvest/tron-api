<?php
declare(strict_types=1);

namespace SoftInvest\TronAPI\Mdanter\Ecc\Exception;

use SoftInvest\TronAPI\Mdanter\Ecc\Primitives\CurveFpInterface;

class PointNotOnCurveException extends PointException
{
    public function __construct(\GMP $x, \GMP $y, CurveFpInterface $curve)
    {
        parent::__construct("Curve " . $curve . " does not contain point (" . gmp_strval($x, 10) . ", " . gmp_strval($y, 10) . ")");
    }
}
