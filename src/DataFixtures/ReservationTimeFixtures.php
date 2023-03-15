<?php

namespace App\DataFixtures;

use App\Entity\ReservationTime;
use App\DataFixtures\ServicesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReservationTimeFixtures extends Fixture implements DependentFixtureInterface
{
    public const RESERVATIONTIME_REFERENCE = 'reservationTime';

    public function load(ObjectManager $manager): void
    {
        $hours = [
            '12:00',
            '12:15',
            '12:30',
            '12:45',
            '13:00',
            '13:15',
            '13:30',
            '19:00',
            '19:15',
            '19:30',
            '19:45',
            '20:00',
            '20:15',
            '20:30',
            '20:45',
            '21:00',
        ];
        for ($i=1; $i <= 16 ; $i++) {
            $reservationTime = new ReservationTime();

            $reservationTime->setHour($hours[$i-1])
                ->setService($this->getReference(ServicesFixtures::SERVICE_REFERENCE));
            $this->setReference(SELF::RESERVATIONTIME_REFERENCE, $reservationTime);

                $manager->persist($reservationTime);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ServicesFixtures::class,
        ];
    }
}
