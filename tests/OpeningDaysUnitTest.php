<?php

namespace App\Tests;

use App\Entity\OpeningDays;
use PHPUnit\Framework\TestCase;

class OpeningDaysTest extends TestCase
{
    public function testIsTrue(): void
    {
        $openingDay = new OpeningDays();

        $openingDay->setDay('day');

        $this->assertTrue($openingDay->getDay() === 'day');
    }

    public function testIsFalse(): void
    {
        $openingDay = new OpeningDays();

        $openingDay->setDay('day');

        $this->assertFalse($openingDay->getDay() === 'false');
    }

    public function testIsEmpty(): void
    {
        $openingDay = new OpeningDays();

        $this->assertEmpty($openingDay->getDay());
    }
}
