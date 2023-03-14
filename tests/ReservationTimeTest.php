<?php

namespace App\Tests;

use App\Entity\ReservationTime;
use PHPUnit\Framework\TestCase;

class ReservationTimeTest extends TestCase
{
    public function testIsTrue(): void
    {
        $reservationTime = new ReservationTime();

        $reservationTime->setHour('12h00');

        $this->assertTrue($reservationTime->getHour() === '12h00');
    }

    public function testIsFalse(): void
    {
        $reservationTime = new ReservationTime();

        $reservationTime->setHour('12h00');

        $this->assertFalse($reservationTime->getHour() === 'false');
    }

    public function testIsEmpty(): void
    {
        $reservationTime = new ReservationTime();

        $this->assertEmpty($reservationTime->getHour());
    }
}