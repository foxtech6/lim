<?php

namespace App\Machine;

/**
 * Class PurchaseTransaction
 * @package App\Machine
 */
class PurchaseTransaction implements PurchaseTransactionInterface
{
    /**
     * @var int
     */
    private $itemQuantity;

    /**
     * @var float
     */
    private $paidAmount;

    /**
     * @inheritdoc
     * @see PurchaseTransactionInterface::getItemQuantity()
     */
    public function getItemQuantity(): int
    {
        return $this->itemQuantity;
    }

    /**
     * @inheritdoc
     * @see PurchaseTransactionInterface::setItemQuantity()
     */
    public function setItemQuantity(int $itemQuantity): PurchaseTransactionInterface
    {
        $this->itemQuantity = $itemQuantity;

        return $this;
    }

    /**
     * @inheritdoc
     * @see PurchaseTransactionInterface::getPaidAmount()
     */
    public function getPaidAmount(): float
    {
        return $this->paidAmount;
    }

    /**
     * @inheritdoc
     * @see PurchaseTransactionInterface::setPaidAmount()
     */
    public function setPaidAmount(float $paidAmount): PurchaseTransactionInterface
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }
}
