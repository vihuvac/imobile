<?php

namespace iMobile\Bundle\DataBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class BaseCommand extends ContainerAwareCommand
{
    abstract protected function mainProcess(InputInterface $input, OutputInterface $output);
    
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->addOption('summary', 'S', InputOption::VALUE_NONE, 'Show the summary even if quiet is set');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->preExecute($input, $output);
        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        try {
            if ($this->preProcess($input, $output) !== false) {
                $this->mainProcess($input, $output);
            }
        } catch (\Exception $ex) {
            if ($em->getConnection()->isTransactionActive()) {
                $em->getConnection()->rollback();
            }
            throw $ex;
        }
    }

    protected function preExecute(InputInterface $input, OutputInterface $output)
    {
    }

    protected function preProcess(InputInterface $input, OutputInterface $output)
    {
    }
}
