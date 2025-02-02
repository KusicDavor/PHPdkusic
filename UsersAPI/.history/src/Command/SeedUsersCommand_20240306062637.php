<?php
// src/Command/SeedUsersCommand.php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SeedUsersCommand extends Command
{
    protected static $defaultName = 'app:seed-users';
    private $entityManager;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function configure()
    {
        $this->setDescription('Seed 100 users into the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Seeding users...');

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setName($faker->name);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $faker->password));
            $user->setContractStartDate($faker->dateTimeBetween('-1 year', 'now'));
            $user->setContractEndDate($faker->dateTimeBetween('now', '+1 year'));
            $user->setType($faker->randomElement(['normal', 'premium']));
            $user->setVerified($faker->boolean);

            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        $output->writeln('Users seeded successfully.');

        return Command::SUCCESS;
    }
}
