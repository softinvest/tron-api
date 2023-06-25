<?php
include_once '../vendor/autoload.php';

use SoftInvest\TronAPI\Provider\HttpProvider;
use SoftInvest\TronAPI\Tron;

$fullNode = new HttpProvider('https://api.trongrid.io');
$solidityNode = new HttpProvider('https://api.trongrid.io');
$eventServer = new HttpProvider('https://api.trongrid.io');
$privateKey = 'private_key';

//Example 1
try {
    $tron = new Tron($fullNode, $solidityNode, $eventServer, $privateKey);
} catch (\SoftInvest\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}