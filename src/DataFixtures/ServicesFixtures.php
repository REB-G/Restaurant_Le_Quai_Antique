<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServicesFixtures extends Fixture
{
    public const SERVICE_REFERENCE = 'service';

    public function load(ObjectManager $manager): void
    {
        $names = [
            'Midi',
            'Soir',
        ];
        for ($i=1; $i <= 2 ; $i++) {
            $service = new Services();

            $service->setName($names[$i-1]);
            $this->setReference(SELF::SERVICE_REFERENCE, $service);

                $manager->persist($service);
        }

        $manager->flush();
    }
}
