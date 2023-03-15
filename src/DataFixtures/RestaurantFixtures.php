<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $restaurant = new Restaurant();
        $restaurant->setName('Le Quai Antique')
            ->setPhoneNumber('06 12 34 56 78')
            ->setNbrTotalOfPlaces(50)
            ->setOpeningDays('Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche')
            ->setOpeningHours('12:00 - 14:00, 19:00 - 22:00')
            ->setAdress('1 rue de la République, 75000 Paris');

        $manager->persist($restaurant);
        
        $manager->flush();
    }
}


