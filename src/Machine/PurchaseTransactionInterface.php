<?php

namespace App\Machine;

/**
 * Interface PurchasableItemInterface
 * @package App\Machine
 */
interface PurchaseTransactionInterface
{
    /**
     * @return int
     */
    public function getItemQuantity(): int;

    /**
     * @param int $itemQuantity
     * @return $this
     */
    public function setItemQuantity(int $itemQuantity): self;

    /**
     * @return float
     */
    public function getPaidAmount(): float;

    /**
     * @param float $paidAmount
     * @return $this
     */
    public function setPaidAmount(float $paidAmount): self;
}