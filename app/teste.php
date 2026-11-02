<?php 

require __DIR__ . '/../vendor/autoload.php';

// namespace app;

use App\application\models\Transaction;
use App\application\services\WalletService;

$transaction_one = new Transaction();
$transaction_one->setValor(20);
$transaction_one->setTipo("entrada");
$transaction_one->setData();


$transaction_two = new Transaction();
$transaction_two->setValor(10);
$transaction_two->setTipo("saida");
$transaction_two->setData();


$transaction_three= new Transaction();
$transaction_three->setValor(45);
$transaction_three->setTipo("entrada");
$transaction_three->setData();


$transaction_four= new Transaction();
$transaction_four->setValor(11);
$transaction_four->setTipo("saida");
$transaction_four->setData();



$wallet = new WalletService();
$wallet->addTrasaction($transaction_one);
$wallet->addTrasaction($transaction_two);
$wallet->addTrasaction($transaction_three);
$wallet->addTrasaction($transaction_four);


// echo "Todas as Transacoes";
print_r($wallet->getTrasactions("entrada"));
// echo "\n";
// echo "SALDO FINAL = " . $wallet->getSaldo();
// echo "\n";


// print_r($wallet->getTrasactions());


