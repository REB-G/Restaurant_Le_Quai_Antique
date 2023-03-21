<?php

namespace App\Tests;

use App\Entity\Reservation;
use PHPUnit\Framework\TestCase;

class ReservationtTest extends TestCase
{
    public function testIsTrue(): void
    {
        $reservation = new Reservation();

        $reservation->setNumberOfGuests(15)
            ->setName('name')
            ->setFirstName('firstName')
            ->setEmail('email');

        $this->assertTrue($reservation->getNumberOfGuests() === 15);
        $this->assertTrue($reservation->getName() === 'name');
        $this->assertTrue($reservation->getFirstName() === 'firstName');
        $this->assertTrue($reservation->getEmail() === 'email');
    }

    public function testIsFalse(): void
    {
        $reservation = new Reservation();

        $reservation->setNumberOfGuests(15)
            ->setName('name')
            ->setFirstName('firstName')
            ->setEmail('email');

        $this->assertFalse($reservation->getNumberOfGuests() === 'false');
        $this->assertFalse($reservation->getName() === 'false');
        $this->assertFalse($reservation->getFirstName() === 'false');
        $this->assertFalse($reservation->getEmail() === 'false');
    }

    public function testIsEmpty(): void
    {
        $reservation = new Reservation();

        $this->assertEmpty($reservation->getNumberOfGuests());
        $this->assertEmpty($reservation->getName());
        $this->assertEmpty($reservation->getFirstName());
        $this->assertEmpty($reservation->getEmail());
    }
}