<?php

namespace Moovin\Job\Backend;

/**
 * Classe de exemplo
 *
 * @author Gabriel Araujo <gabriel.araujo.r@hotmail.com>
 */

class Account
{
    protected $balance;

    public function __construct()
    {
        $this->balance = 0.00;
    }

    public function getAccountBalance()
    {
        return $this->balance;
    }

    public function deposit($value)
    {
        $this->balance += $value;
        return "Depósito realizado com sucesso!";
    }

    public function withdraw($value)
    {
        $currentBalance = $this->getAccountBalance();

        if ($value > $this->withdrawalLimit) {
            return array('status' => false, 'message' => "O valor é maior que o limite de saque permitido referente a conta. Seu limite é: B$ " . number_format($this->withdrawalLimit, 2, ",", ".") . " ");
        }

        if (($value + $this->operatingFee) > $currentBalance) {
            return array('status' => false, 'message' => "Saldo insuficiente. Saldo atual: B$ " . number_format($this->balance, 2, ",", ".") . " ");
        }

        $this->balance -= ($value + $this->operatingFee);
        return array('status' => true, 'message' => "Saque efetuado com sucesso! Saldo atual: B$ " . number_format($this->balance, 2, ",", ".") . " ");
    }

    public function transfer($destinationAccount, $value)
    {
        $currentBalance = $this->getAccountBalance();
        if ($value > $currentBalance) {
            return array('status' => false, 'message' => "O saldo é insuficiente para realizar a transferência. Saldo atual: B$ " . number_format($currentBalance, 2, ",", ".") . " ");
        }

        $this->balance -= $value;
        $destinationAccount->deposit($value);
        return array('status' => true, 'message' => "Transferência realizada com sucesso. Saldo atual: B$ " . number_format($this->balance, 2, ",", ".") . " ");
    }
}
