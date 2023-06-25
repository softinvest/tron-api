<?php
include_once '../vendor/autoload.php';

$fullNode = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \SoftInvest\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\SoftInvest\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress('address');
$tron->setPrivateKey('privateKey');

try {
    $transfer = $tron->send( 'ToAddress', 1);
} catch (\SoftInvest\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);