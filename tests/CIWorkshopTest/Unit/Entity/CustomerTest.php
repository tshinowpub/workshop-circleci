<?php

declare(strict_types=1);

namespace CIWorkshopTest\Unit\Entity;

use CIWorkshop\Entity\Customer;
use CIWorkshop\Entity\Movie;
use CIWorkshop\Entity\Rental;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomerTest
 *
 * @package CIWorkshop\Tests\Entity
 */
class CustomerTest extends TestCase
{
    /**
     * @test
     */
    public function testStatement__領収書の出力が正しいことを検証できる(): void
    {
        $rentals = [
            new Rental(new Movie(1, "天空の城ラピュタ", Movie::REGULAR), 1),
            new Rental(new Movie(2, "となりのトトロ", Movie::CHILDRENS), 1),
            new Rental(new Movie(3, "毛虫のボロ", Movie::NEW_RELEASE), 1),
        ];

        $customer = new Customer("レンタルさん");
        foreach ($rentals as $rental) {
            $customer->addRental($rental);
        }

        $expected = <<<EOT
Rental Record for レンタルさん

天空の城ラピュタ  0.5
となりのトトロ  1.5
毛虫のボロ  3
Amount owed is 5
You earned 3 frequent renter points
EOT;

        $this->assertSame($expected, $customer->statement());
    }
}
