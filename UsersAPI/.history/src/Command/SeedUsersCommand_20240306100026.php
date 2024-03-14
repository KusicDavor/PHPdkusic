<?php
// src/Command/SeedUsersCommand.php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(name: 'app:seed-users', description: 'Seed 100 users into database')]
class SeedUsersCommand extends Command
{
    private $entityManager;
    private $passwordEncoder;
    private $jwtManager;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder, JWTTokenManagerInterface $jwtManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtManager = $jwtManager;
    }

    protected function configure()
    {
        $this->setDescription('Seed 100 users into the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Seeding users...');

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 2; $i++) {
            $user = new User();
            $user->setName($faker->name);
            $user->setPassword($this->passwordEncoder->hashPassword($user, $faker->password));
            $user->setContractStartDate($faker->dateTimeBetween('-1 year', 'now'));
            $user->setContractEndDate($faker->dateTimeBetween('now', '+1 year'));
            $user->setType($faker->randomElement(['normal', 'premium']));
            $user->setVerified($faker->boolean);
            $user->setApiKey($this->jwtManager->create($user));

            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        $output->writeln('Users seeded successfully.');

        return Command::SUCCESS;
    }
}
