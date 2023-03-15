<?php

namespace App\DataFixtures;

use App\Entity\Menus;
use App\DataFixtures\DishesFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MenusFixtures extends Fixture implements DependentFixtureInterface
{
    public const MENU_REFERENCE = 'menu';

    public function load(ObjectManager $manager): void
    {
        $title = [
            'Formule du midi',
            'Menu Duo',
            'Menu Gourmands',
        ];

        $prices = [
            15,
            35,
            50,
        ];

        $faker = Faker\Factory::create('fr_FR');

        for ($i=1; $i <= 3 ; $i++) {
            $menu = new Menus();
            $menu->setTitle($title[$i-1]);
            $menu->setDescription($faker->text);
            $menu->setPrice($prices[$i-1])
                ->addDish($this->getReference(DishesFixtures::DISH_REFERENCE));
            $this->setReference(SELF::MENU_REFERENCE, $menu);

                $manager->persist($menu);
        }
        
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            DishesFixtures::class
        ];
    }
}
