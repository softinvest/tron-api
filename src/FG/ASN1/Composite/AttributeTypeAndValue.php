<?php
/*
 * This file is part of the PHPASN1 library.
 *
 * Copyright © Friedrich Große <friedrich.grosse@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoftInvest\TronAPI\FG\ASN1\Composite;

use SoftInvest\TronAPI\FG\ASN1\ASNObject;
use SoftInvest\TronAPI\FG\ASN1\Universal\ObjectIdentifier;
use SoftInvest\TronAPI\FG\ASN1\Universal\Sequence;

class AttributeTypeAndValue extends Sequence
{
    /**
     * @param ObjectIdentifier|string $objIdentifier
     * @param \SoftInvest\TronAPI\FG\ASN1\ASNObject $value
     */
    public function __construct($objIdentifier, ASNObject $value)
    {
        if ($objIdentifier instanceof ObjectIdentifier == false) {
            $objIdentifier = new ObjectIdentifier($objIdentifier);
        }
        parent::__construct($objIdentifier, $value);
    }

    public function __toString()
    {
        return $this->children[0].': '.$this->children[1];
    }
}
