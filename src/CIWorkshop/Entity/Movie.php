<?php

declare(strict_types=1);

namespace CIWorkshop\Entity;

/**
* Class Movie
*
* @package CIWorkshop\Entity
*/
class Movie
{
    // 子供向け
    const CHILDRENS = 2;

    // 一般向け
    const REGULAR = 0;

    // 新作
    const NEW_RELEASE = 1;

    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var int
     */
    private int $priceCode;

    /**
     * @param int $id
     * @param string $title
     * @param int $priceCode
     */
    public function __construct(int $id, string $title, int $priceCode)
    {
        $this->id = $id;
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPriceCode(): int
    {
        return  $this->priceCode;
    }

    /**
     * @param int $priceCode
     */
    public function setPriceCode(int $priceCode): void
    {
        $this->priceCode = $priceCode;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
