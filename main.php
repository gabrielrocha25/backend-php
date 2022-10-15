<?php

require_once __DIR__ . '/vendor/autoload.php';

use Moovin\Job\Backend\CheckingAccount as checkingAccount;
use Moovin\Job\Backend\SavingsAccount as savingsAccount;

$checkingAccount = new CheckingAccount();
$savingsAccount = new SavingsAccount();

$checkingAccount->deposit(2100);
$savingsAccount->deposit(2200);

do {
    do {
        $line = readline("Informe seu tipo de conta: \n 1 - Conta corrente; \n 2 - Poupança " . PHP_EOL);
    } while ($line > 2);

    if ($line == 1) {
        $mainAccount = $checkingAccount;
        $secondAccount = $savingsAccount;
    } else {
        $mainAccount = $savingsAccount;
        $secondAccount = $checkingAccount;
    }

    echo " Operação que deseja realizar: \n
        1 - Consultar saldo; \n
        2 - Deposito; \n
        3 - Saque; \n
        4 - Transferência; \n
        5 - Sair. \n";

    $transaction = readline(" ");

    switch ($transaction) {
        case 1:
            $accountBalance = $mainAccount->getAccountBalance();
            echo "\n Saldo atual de sua conta é B$ " . number_format($accountBalance, 2, ",", ".") . " " . PHP_EOL;
            break;

        case 2:
            $value = (float) readline("Valor que deseja depositar: ");
            $result = $mainAccount->deposit($value);
            echo "\n " . $result . PHP_EOL;
            break;

        case 3:
            $value = (float) readline("Valor que deseja sacar: ");
            $result = $mainAccount->withdraw($value);
            echo "\n " . $result['message'] . " " . PHP_EOL;
            break;

        case 4:
            $value = (float) readline("Valor que deseja transferir: ");
            $result = $mainAccount->transfer($secondAccount, $value);
            echo "\n " . $result['message'] . " " . PHP_EOL;
            break;

        default:
            "Opção inválida." . PHP_EOL;
            break;
    }
} while ($transaction != 5);
