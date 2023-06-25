<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace SoftInvest\TronAPI\Web3\Methods\Eth;

use InvalidArgumentException;
use SoftInvest\TronAPI\Web3\Methods\EthMethod;
use SoftInvest\TronAPI\Web3\Validators\TagValidator;
use SoftInvest\TronAPI\Web3\Validators\QuantityValidator;
use SoftInvest\TronAPI\Web3\Formatters\OptionalQuantityFormatter;
use SoftInvest\TronAPI\Web3\Formatters\BigNumberFormatter;

class GetUncleCountByBlockNumber extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        [
            TagValidator::class, QuantityValidator::class
        ]
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [
        OptionalQuantityFormatter::class
    ];

    /**
     * outputFormatters
     * 
     * @var array
     */
    protected $outputFormatters = [
        BigNumberFormatter::class
    ];

    /**
     * defaultValues
     * 
     * @var array
     */
    protected $defaultValues = [
        'latest'
    ];

    /**
     * construct
     * 
     * @param string $method
     * @param array $arguments
     * @return void
     */
    // public function __construct($method='', $arguments=[])
    // {
    //     parent::__construct($method, $arguments);
    // }
}