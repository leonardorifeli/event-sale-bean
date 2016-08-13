<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProductBundle\Business\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity_promotion", type="integer", nullable=true)
     */
    private $quantityPromotion;

    /**
     * @var float
     *
     * @ORM\Column(name="price_promotion", type="float", nullable=true)
     */
    private $pricePromotion;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_promotion", type="boolean", nullable=true)
     */
    private $hasPromotion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantityPromotion
     *
     * @param integer $quantityPromotion
     *
     * @return Product
     */
    public function setQuantityPromotion($quantityPromotion)
    {
        $this->quantityPromotion = $quantityPromotion;

        return $this;
    }

    /**
     * Get quantityPromotion
     *
     * @return int
     */
    public function getQuantityPromotion()
    {
        return $this->quantityPromotion;
    }

    /**
     * Set pricePromotion
     *
     * @param float $pricePromotion
     *
     * @return Product
     */
    public function setPricePromotion($pricePromotion)
    {
        $this->pricePromotion = $pricePromotion;

        return $this;
    }

    /**
     * Get pricePromotion
     *
     * @return float
     */
    public function getPricePromotion()
    {
        return $this->pricePromotion;
    }

    /**
     * Set hasPromotion
     *
     * @param boolean $hasPromotion
     *
     * @return Product
     */
    public function setHasPromotion($hasPromotion)
    {
        $this->hasPromotion = $hasPromotion;

        return $this;
    }

    /**
     * Get hasPromotion
     *
     * @return bool
     */
    public function getHasPromotion()
    {
        return $this->hasPromotion;
    }
}
