<?php
/*
 * This file is part of the PHPASN1 library.
 *
 * Copyright © Friedrich Große <friedrich.grosse@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoftInvest\TronAPI\FG\ASN1\Universal;

use SoftInvest\TronAPI\FG\ASN1\Construct;
use SoftInvest\TronAPI\FG\ASN1\Identifier;
use SoftInvest\TronAPI\FG\ASN1\Parsable;

class Sequence extends Construct implements Parsable
{
    public function getType()
    {
        return Identifier::SEQUENCE;
    }
}
