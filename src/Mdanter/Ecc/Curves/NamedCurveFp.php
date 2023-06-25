<?php
declare(strict_types=1);

namespace SoftInvest\TronAPI\Mdanter\Ecc\Curves;

use SoftInvest\TronAPI\Mdanter\Ecc\Math\GmpMathInterface;
use SoftInvest\TronAPI\Mdanter\Ecc\Primitives\CurveFp;
use SoftInvest\TronAPI\Mdanter\Ecc\Primitives\CurveParameters;

class NamedCurveFp extends CurveFp
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string           $name
     * @param CurveParameters  $parameters
     * @param GmpMathInterface $adapter
     */
    public function __construct(string $name, CurveParameters $parameters, GmpMathInterface $adapter)
    {
        $this->name = $name;

        parent::__construct($parameters, $adapter);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
