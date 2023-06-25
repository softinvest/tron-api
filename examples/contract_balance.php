<?php
$fullNode = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \SoftInvest\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \SoftInvest\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\SoftInvest\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


$balance=$tron->getTransactionBuilder()->contractbalance($tron->getAddress);
foreach($balance as $key =>$item)
{
	echo $item["name"]. " (".$item["symbol"].") => " . $item["balance"] . "\n";
}

