<?php

namespace App\Machine;

/**
 * Class CigaretteMachine
 * @package App\Machine
 */
class CigaretteMachine implements MachineInterface
{
    /**
     * @var float
     */
    const ITEM_PRICE = 4.99;

    /**
     * @var PurchasedItemInterface
     */
    private $purchasedItem;

    /**
     * @param PurchasedItemInterface $purchasedItem
     */
    public function __construct(PurchasedItemInterface $purchasedItem)
    {
        $this->purchasedItem = $purchasedItem;
    }

    /**
     * @inheritdoc
     * @see MachineInterface::execute()
     */
    public function execute(PurchaseTransactionInterface $purchaseTransaction): PurchasedItemInterface
    {
        return $this->purchasedItem;
    }
}