<?php

namespace Moovin\Job\Backend;

/**
 * Classe de conta poupança
 *
 * @author Gabriel Araujo <gabriel.araujo.r@hotmail.com>
 */
class SavingsAccount extends Account
{
    protected $withdrawalLimit  = 1000.00;
    protected $operatingFee = 0.80;

    public function __construct()
    {
        parent::__construct();
    }
}
