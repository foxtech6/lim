<?php

namespace App\Machine;

use App\Exception\NotEnoughMoney;

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
     * @var array
     */
    const COINS_DENOMINATION = [2, 1, .5, .2, .1, .05, .02, .01];

    /**
     * @var PurchasedItemInterface
     */
    private $purchasedItem;

    /**
     * @return PurchasedItemInterface
     */
    public function getPurchasedItem(): PurchasedItemInterface
    {
        return $this->purchasedItem;
    }

    /**
     * @param PurchasedItemInterface $purchasedItem
     * @return CigaretteMachine
     */
    public function setPurchasedItem(PurchasedItemInterface $purchasedItem): self
    {
        $this->purchasedItem = $purchasedItem;

        return $this;
    }

    /**
     * @inheritdoc
     * @see MachineInterface::execute()
     *
     * @throws NotEnoughMoney
     */
    public function execute(PurchaseTransactionInterface $purchaseTransaction): PurchasedItemInterface
    {
        $totalAmount = $purchaseTransaction->getItemQuantity() * self::ITEM_PRICE;
        $change = $purchaseTransaction->getPaidAmount() - $totalAmount;

        if ($change < 0) {
            throw new NotEnoughMoney();
        }

        return $this->getPurchasedItem()->setTotalAmount($totalAmount)
            ->setItemQuantity($purchaseTransaction->getItemQuantity())
            ->setChange($this->calculate(\round($change, 2)));
    }

    /**
     * @param float $change
     * @return array
     */
    private function calculate(float $change): array
    {
        $coins = [];

        foreach (self::COINS_DENOMINATION as $coin) {
            $coin = \round($coin, 2);

            if ($change < $coin) {
                continue;
            }

            $count = (int)($change / $coin);
            $change -= $coin * $count;
            $coins[] = [$coin, $count];

            if (0 == $change) {
                return $coins;
            }
        }

        return $coins;
    }
}
