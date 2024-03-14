<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'app:add-user',
    description: 'Creates a new user.',
    hidden: false,
    aliases: ['app:add-user']
)]
class AddVacationDaysCommand extends Command
{
    protected static $defaultName = 'app:add-vacation-days';
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setDescription('Add 20 days of available vacation to every user on January 1st');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Get the current date
        $currentDate = new \DateTime();
        $currentYear = $currentDate->format('Y');

        // Check if it's January 1st
        if ($currentDate->format('m-d') === '01-01') {
            // Get the user repository
            $userRepository = $this->entityManager->getRepository(User::class);

            // Get all users
            $users = $userRepository->findAll();

            // Add 20 days of vacation to each user
            foreach ($users as $user) {
                $user->setVacationDays($user->getVacationDays() + 20);
            }

            // Persist changes
            $this->entityManager->flush();

            // Output success message
            $output->writeln('20 days of vacation added to every user.');
        } else {
            // Output message if it's not January 1st
            $output->writeln('It is not January 1st. No action taken.');
        }

        return Command::SUCCESS;
    }
}
