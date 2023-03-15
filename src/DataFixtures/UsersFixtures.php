<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Users;
use App\DataFixtures\ReservationFixtures;
use App\DataFixtures\AllergiesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    public const USER_REFERENCE = 'user';

    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setName('Nuttle')
            ->setFirstname('Ursule')
            ->setEmail('rest.quai.antique@gmail.com')
            ->setPassword($this->passwordHasher->hashPassword($admin, 'RestQuai.1'))
            ->setRoles(['ROLE_ADMIN'])
            ->setDefaultNumberOfGuests(1);

        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = new Users();
            $user->setName($faker->lastName())
                ->setFirstname($faker->firstName())
                ->setEmail($faker->email())
                ->setPassword($this->passwordHasher->hashPassword($user, 'Restaurant.MotDePasse.1'))
                ->setDefaultNumberOfGuests($faker->numberBetween(1, 6))
                ->addReservation($this->getReference(ReservationFixtures::RESERVATION_REFERENCE))
                ->addAllergy($this->getReference(AllergiesFixtures::ALLERGY_REFERENCE));
            $this->setReference(SELF::USER_REFERENCE, $user);

            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ReservationFixtures::class,
            AllergiesFixtures::class,
        ];
    }
}
