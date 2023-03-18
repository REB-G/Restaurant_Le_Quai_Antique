<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\HomePage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomePageFixtures extends Fixture
{
    public const HOME_PAGE_REFERENCE = 'home_page';

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i=1; $i <=1; $i++) {
            $page = new HomePage();
            $page->setPageTitle($faker->word(3))
                ->setWelcomeText($faker->text(50))
                ->setAboutTitle($faker->word(3))
                ->setAboutText($faker->text(200))
                ->setSectionDishesTitle($faker->word)
                ->setSectionDishesText($faker->text(200));
            $this->setReference(SELF::HOME_PAGE_REFERENCE, $page);

            $manager->persist($page);
        }

        $manager->flush();
    }
}
