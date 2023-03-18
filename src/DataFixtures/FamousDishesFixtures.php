<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\FamousDishes;
use App\DataFixtures\HomePageFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FamousDishesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');


        for ($i=0; $i <=4; $i++) {
            $famousDish = new FamousDishes();
            $famousDish->setName($faker->word)
                ->setDescription($faker->text(200))
                ->setImageName('default.jpg')
                ->setHomePage($this->getReference(HomePageFixtures::HOME_PAGE_REFERENCE));

            $manager->persist($famousDish);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            HomePageFixtures::class
        ];
    }
}
