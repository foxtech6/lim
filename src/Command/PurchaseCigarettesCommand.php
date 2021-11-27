<?php

namespace App\Command;

use App\Exception\NotEnoughMoney;
use App\Machine\CigaretteMachine;
use App\Machine\PurchasedItem;
use App\Machine\PurchaseTransaction;
use Throwable;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class PurchaseCigarettesCommand
 * @package App\Command
 */
class PurchaseCigarettesCommand extends Command
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this->addArgument('packs', InputArgument::REQUIRED, "How many packs do you want to buy?");
        $this->addArgument('amount', InputArgument::REQUIRED, "The amount in euro.");
    }

    /**
     * @param InputInterface   $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $itemCount = (int) $input->getArgument('packs');
        $amount = (float) \str_replace(',', '.', $input->getArgument('amount'));

        if ($itemCount < 1) {
            $output->writeln('<error>Packs count should be at least 1</error>');

            return;
        }

        try {
            $purchaseTransaction = new PurchaseTransaction();
            $cigaretteMachine = new CigaretteMachine();

            $purchaseItem = $cigaretteMachine->setPurchasedItem(new PurchasedItem())
                ->execute($purchaseTransaction->setPaidAmount($amount)->setItemQuantity($itemCount));

            $output->writeln(sprintf(
                'You bought <info>%s</info> packs of cigarettes for <info>%s</info>, each for <info>%s</info>.',
                $itemCount,
                $purchaseItem->getTotalAmount(),
                CigaretteMachine::ITEM_PRICE
            ));

            $output->writeln('Your change is:');

            $table = new Table($output);
            $table->setHeaders(['Coins', 'Count'])->setRows($purchaseItem->getChange())->render();
        } catch (NotEnoughMoney $e) {
            $output->writeln(sprintf('<error>%s</error>', $e->getMessage()));
        } catch (Throwable $e) {
            $output->writeln(sprintf('<error>%s</error>', 'Cigarette machine not working'));
            //log $e
        }
    }
}
