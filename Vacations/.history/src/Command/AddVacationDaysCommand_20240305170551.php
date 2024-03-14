<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

#[AsCommand(
    name: 'app:add-vacation-days',
    description: 'Add vacation days to users',
    hidden: false,
    aliases: ['app:add-vacation-days']
)]
class AddVacationDaysCommand extends Command
{
    private $connection;
    protected static $defaultName = 'app:add-vacation-days';

    public function __construct(Connection $connection)
    {
        parent::__construct();
        $this->connection = $connection;
    }

    protected function configure()
    {
        $this->setDescription('Add vacation days to every user.')
            ->setHelp('This command adds a specified number of vacation days to every user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $question = new Question('Enter the number of vacation days to add: ', 20);
        $daysToAdd = $helper->ask($input, $output, $question);
        // Get the current date
        $currentDate = new \DateTime();
        $query = "UPDATE user SET vacation_days = vacation_days + 20";
        $statement = $this->connection->prepare($query);
        $statement->executeQuery();

        $output->writeln('20 days of vacation added to every user.');

        return Command::SUCCESS;
    }
}
