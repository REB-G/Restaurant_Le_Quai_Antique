<?php

namespace App\DataFixtures;

use App\DataFixtures\ServicesFixtures;
use App\Entity\OpeningDays;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OpeningDaysFixtures extends Fixture implements DependentFixtureInterface
{
    public const OPENINGDAY_REFERENCE = 'openingDay';

    public function load(ObjectManager $manager): void
    {
        $days = [
            'Lundi',
            'Mardi',
            'Mercredi',
            'Jeudi',
            'Vendredi',
            'Samedi',
            'Dimanche',
        ];
        for ($i=1; $i <= 7 ; $i++) {
            $openingDay = new OpeningDays();

            $openingDay->setDay($days[$i-1])
                ->addService($this->getReference(ServicesFixtures::SERVICE_REFERENCE));
            $this->setReference(SELF::OPENINGDAY_REFERENCE, $openingDay);

                $manager->persist($openingDay);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ServicesFixtures::class
        ];
    }
}
