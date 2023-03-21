<?php

namespace App\Tests;

use App\Entity\Services;
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    public function testIsTrue(): void
    {
        $service = new Services();

        $service->setName('name');

        $this->assertTrue($service->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $service = new Services();

        $service->setName('name');

        $this->assertFalse($service->getName() === 'false');
    }

    public function testIsEmpty(): void
    {
        $service = new Services();

        $this->assertEmpty($service->getName());
    }
}