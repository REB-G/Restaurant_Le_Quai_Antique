<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Reservation;
use App\DataFixtures\ReservationTimeFixtures;
use App\DataFixtures\AllergiesFixtures;
use App\DataFixtures\ServicesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public const RESERVATION_REFERENCE = 'reservation';

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i=1; $i <=20; $i++) {
            $reservation = new Reservation();

            $reservation->setReservationdate($faker->dateTimeBetween('now', '+1 month'))
                ->setReservationHour($this->getReference(ReservationTimeFixtures::RESERVATIONTIME_REFERENCE))
                ->setNumberOfGuests(2)
                ->setName($faker->name())
                ->setFirstname($faker->firstName())
                ->setEmail($faker->email())
                ->addAllergy($this->getReference(AllergiesFixtures::ALLERGY_REFERENCE))
                ->setService($this->getReference(ServicesFixtures::SERVICE_REFERENCE));
            $this->setReference(SELF::RESERVATION_REFERENCE, $reservation);

            $manager->persist($reservation);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ReservationTimeFixtures::class,
            AllergiesFixtures::class,
            ServicesFixtures::class,
        ];
    }
}
