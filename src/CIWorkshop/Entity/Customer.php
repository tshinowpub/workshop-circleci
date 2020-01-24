<?php

declare(strict_types=1);

namespace CIWorkshop\Entity;

/**
 * Class Customer
 *
 * @package CIWorkshop\Entity
 */
class Customer
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var Rental[]
     */
    private array $rentals = [];

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function statement(): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = sprintf("Rental Record for %s\n\n", $this->getName());

        foreach ($this->rentals as $rental) {
            $amount = 0;

            switch ($rental->getMovie()->getPriceCode()) {
                case Movie::REGULAR:
                    $amount += 2;
                    if ($rental->getDayRented()) {
                        $amount += ($rental->getDayRented() - 2) * 1.5;
                    }
                    break;

                case Movie::NEW_RELEASE:
                    $amount += $rental->getDayRented() * 3;
                    break;

                case Movie::CHILDRENS:
                    $amount += 1.5;
                    if ($rental->getDayRented() > 3) {
                        $amount += ($rental->getDayRented() - 3) * 1.5;
                    }
                    break;
            }

            //レンタルポイントを加算
            $frequentRenterPoints ++;

            //新作を二日以上借りた場合はボーナスポイント
            if ($rental->getMovie()->getPriceCode() === Movie::NEW_RELEASE
                && $rental->getDayRented() > 1) {
                $frequentRenterPoints ++;
            }

            //この貸し出しに関数数値の表示
            $result .= sprintf("%s  %s\n", $rental->getMovie()->getTitle(), $amount);

            $totalAmount += $amount;
        }

        //フッター部分の追加
        $result .= sprintf("Amount owed is %s\n", $totalAmount);
        $result .= sprintf("You earned %s frequent renter points", $frequentRenterPoints);

        return $result;
    }
}
