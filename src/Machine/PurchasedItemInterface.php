<?php

namespace App\Machine;

/**
 * Interface PurchasedItemInterface
 * @package App\Machine
 */
interface PurchasedItemInterface
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
    public function getTotalAmount(): float;

    /**
     * @param float $totalAmount
     * @return $this
     */
    public function setTotalAmount(float $totalAmount): self;

    /**
     * Returns the change in this format:
     *
     * Coin Count
     * 0.01 0
     * 0.02 0
     * .... .....
     *
     * @return array
     */
    public function getChange(): array;

    /**
     * @param array $change
     * @return $this
     */
    public function setChange(array $change): self;
}