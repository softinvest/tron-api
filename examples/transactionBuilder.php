<?php
$fullNode = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \SoftInvest\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\SoftInvest\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


try {
    $transaction = $tron->getTransactionBuilder()->sendTrx('to', 2,'fromAddress');
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
} catch (\SoftInvest\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}
