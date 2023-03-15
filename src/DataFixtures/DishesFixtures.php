<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use App\DataFixtures\CategoriesFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class DishesFixtures extends Fixture implements DependentFixtureInterface
{
    public const DISH_REFERENCE = 'dish';

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i < 40; $i++) {
            $dish = new Dishes();
            $dish->setName($faker->word)
                ->setDescription($faker->text(200))
                ->setPrice($faker->numberBetween(7, 28))
                ->setImageName('default.jpg')
                ->setCategory($this->getReference(CategoriesFixtures::CATEGORY_REFERENCE));
            $this->setReference(SELF::DISH_REFERENCE, $dish);

                $manager->persist($dish);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoriesFixtures::class
        ];
    }
}
