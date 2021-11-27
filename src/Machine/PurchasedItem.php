<?php

namespace App\Machine;

/**
 * Class PurchasedItem
 * @package App\Machine
 */
class PurchasedItem implements PurchasedItemInterface
{
    /**
     * @var int
     */
    private $itemQuantity;

    /**
     * @var float
     */
    private $totalAmount;

    /**
     * @var array
     */
    private $change;

    /**
     * @inheritdoc
     * @see PurchasedItemInterface::getItemQuantity()
     */
    public function getItemQuantity(): int
    {
        return $this->itemQuantity;
    }

    /**
     * @inheritdoc
     * @see PurchasedItemInterface::setItemQuantity()
     */
    public function setItemQuantity(int $itemQuantity): PurchasedItemInterface
    {
        $this->itemQuantity = $itemQuantity;

        return $this;
    }

    /**
     * @inheritdoc
     * @see PurchasedItemInterface::getTotalAmount()
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @inheritdoc
     * @see PurchasedItemInterface::setTotalAmount()
     */
    public function setTotalAmount(float $totalAmount): PurchasedItemInterface
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @inheritdoc
     * @see PurchasedItemInterface::getChange()
     */
    public function getChange(): array
    {
        return $this->change;
    }

    /**
     * @inheritdoc
     * @see PurchasedItemInterface::setChange()
     */
    public function setChange(array $change): PurchasedItemInterface
    {
        $this->change = $change;

        return $this;
    }
}