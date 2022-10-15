<?php

namespace Moovin\Job\Backend;

/**
 * Classe de conta corrente
 *
 * @author Gabriel Araujo <gabriel.araujo.r@hotmail.com>
 */
class CheckingAccount extends Account
{
    protected $withdrawalLimit  = 600.00;
    protected $operatingFee = 2.50;

    public function __construct()
    {
        parent::__construct();
    }
}
