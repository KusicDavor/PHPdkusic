<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'app:add-vacation-days',
    description: 'Add vacation days to users',
    hidden: false,
    aliases: ['app:add-vacation-days']
)]
class AddVacationDaysCommand extends Command
{
    private $connection;

    public function __construct(Connection $connection)
    {
        parent::__construct();
        $this->connection = $connection;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Get the current date
        $currentDate = new \DateTime();
        $currentYear = $currentDate->format('Y');

        // Check if it's January 1st
        if ($currentDate->format('m-d') === '01-01') {
            // Execute SQL query to add 20 days of available vacation to every user
            $query = "UPDATE user SET available_vacation_days = available_vacation_days + 20";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            $output->writeln('20 days of vacation added to every user.');
        } else {
            $output->writeln('It is not January 1st. No action taken.');
        }

        return Command::SUCCESS;
    }
}
