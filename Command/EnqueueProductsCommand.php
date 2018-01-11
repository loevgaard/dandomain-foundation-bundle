<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Enqueuer\ProductEnqueuerInterface;
use Loevgaard\DandomainFoundationBundle\UpdatedEntityProvider\UpdatedProductProviderInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EnqueueProductsCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var UpdatedProductProviderInterface
     */
    protected $updatedProductProvider;

    /**
     * @var ProductEnqueuerInterface
     */
    protected $productEnqueuer;

    public function __construct(UpdatedProductProviderInterface $updatedProductProvider, ProductEnqueuerInterface $productEnqueuer)
    {
        $this->updatedProductProvider = $updatedProductProvider;
        $this->productEnqueuer = $productEnqueuer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:enqueue:products')
            ->setDescription('Will enqueue the latest modified products')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        foreach ($this->updatedProductProvider->getUpdatedEntities() as $product) {
            $this->productEnqueuer->enqueue($product->number);
        }

        return 0;
    }
}
