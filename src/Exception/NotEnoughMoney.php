<?php

namespace App\Exception;

use Exception;
use Throwable;

/**
 * Class NotEnoughMoney
 * @package App\Exception
 */
class NotEnoughMoney extends Exception
{
    /**
     * @inheritdoc
     * @see Exception::__construct()
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('You have not entered enough money.', 422, $previous);
    }
}
