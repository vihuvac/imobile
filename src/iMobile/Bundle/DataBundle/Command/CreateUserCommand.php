<?php

namespace iMobile\Bundle\DataBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use FOS\UserBundle\Model\User;
use FOS\UserBundle\Command\CreateUserCommand as BaseCreateUserCommand;

class CreateUserCommand extends BaseCreateUserCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('vihuvac:user:create')
            ->setDefinition(array(
                new InputArgument('username', InputArgument::REQUIRED, 'The username'),
                new InputArgument('email', InputArgument::REQUIRED, 'The email'),
                new InputArgument('password', InputArgument::REQUIRED, 'The password'),
                new InputOption('name', null, InputOption::VALUE_NONE, 'The name'),
                new InputOption('super-admin', null, InputOption::VALUE_NONE, 'Set the user as super admin'),
                new InputOption('inactive', null, InputOption::VALUE_NONE, 'Set the user as inactive'),
            ));
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username   = $input->getArgument('username');
        $email      = $input->getArgument('email');
        $password   = $input->getArgument('password');
        $name       = $input->getOption('name');
        $inactive   = $input->getOption('inactive');
        $superadmin = $input->getOption('super-admin');

        $manipulator = $this->getContainer()->get('fos_user.util.user_manipulator');
        $manipulator->create($username, $password, $email, $name, !$inactive, $superadmin);

        $output->writeln(sprintf('Created user <comment>%s</comment>', $username));
    }
}
