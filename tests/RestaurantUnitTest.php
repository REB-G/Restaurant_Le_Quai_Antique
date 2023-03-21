<?php

namespace App\Tests;

use App\Entity\Restaurant;
use PHPUnit\Framework\TestCase;

class RestaurantTest extends TestCase
{
    public function testIsTrue(): void
    {
        $restaurant = new Restaurant();

        $restaurant->setName('name')
            ->setPhoneNumber('phoneNumber')
            ->setNbrTotalOfPlaces(15)
            ->setOpeningDays('openingDays')
            ->setOpeningHours('openingHours')
            ->setAdress('address');

        $this->assertTrue($restaurant->getName() === 'name');
        $this->assertTrue($restaurant->getPhoneNumber() === 'phoneNumber');
        $this->assertTrue($restaurant->getNbrTotalOfPlaces() === 15);
        $this->assertTrue($restaurant->getOpeningDays() === 'openingDays');
        $this->assertTrue($restaurant->getOpeningHours() === 'openingHours');
        $this->assertTrue($restaurant->getAdress() === 'address');
    }

    public function testIsFalse(): void
    {
        $restaurant = new Restaurant();

        $restaurant->setName('name')
            ->setPhoneNumber('phoneNumber')
            ->setNbrTotalOfPlaces(15)
            ->setOpeningDays('openingDays')
            ->setOpeningHours('openingHours')
            ->setAdress('address');

        $this->assertFalse($restaurant->getName() === 'false');
        $this->assertFalse($restaurant->getPhoneNumber() === 'false');
        $this->assertFalse($restaurant->getNbrTotalOfPlaces() === 0);
        $this->assertFalse($restaurant->getOpeningDays() === 'false');
        $this->assertFalse($restaurant->getOpeningHours() === 'false');
        $this->assertFalse($restaurant->getAdress() === 'false');
    }

    public function testIsEmpty(): void
    {
        $restaurant = new Restaurant();

        $this->assertEmpty($restaurant->getName());
        $this->assertEmpty($restaurant->getPhoneNumber());
        $this->assertEmpty($restaurant->getNbrTotalOfPlaces());
        $this->assertEmpty($restaurant->getOpeningDays());
        $this->assertEmpty($restaurant->getOpeningHours());
        $this->assertEmpty($restaurant->getAdress());
    }
}