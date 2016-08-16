<?php

namespace SaleProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity(repositoryClass="SaleProductBundle\Repository\SaleRepository")
 */
class Sale
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
    * @var float
    *
    * @ORM\Column(name="price", type="float", precision=10, scale=2, nullable=true, unique=false)
    */
    private $price;

    /**
    * @var float
    *
    * @ORM\Column(name="value", type="float", precision=10, scale=2, nullable=true, unique=false)
    */
    private $value;

    /**
    * @var float
    *
    * @ORM\Column(name="return_price", type="float", precision=10, scale=2, nullable=true, unique=false)
    */
    private $returnPrice;

    /**
    * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Product")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
    * })
    */
    private $product;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_cart", type="boolean", nullable=true)
     */
    private $hasCart;

    /**
     * @var bool
     *
     * @ORM\Column(name="cart_type", type="boolean", nullable=true)
     */
    private $cartType;

    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of Quantity
     *
     * @param int quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of Price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of Price
     *
     * @param float price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of Value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of Value
     *
     * @param float value
     *
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of Return Price
     *
     * @return float
     */
    public function getReturnPrice()
    {
        return $this->returnPrice;
    }

    /**
     * Set the value of Return Price
     *
     * @param float returnPrice
     *
     * @return self
     */
    public function setReturnPrice($returnPrice)
    {
        $this->returnPrice = $returnPrice;

        return $this;
    }

    /**
     * Get the value of Product
     *
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of Product
     *
     * @param mixed product
     *
     * @return self
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of Created At
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of Created At
     *
     * @param \DateTime createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of Updated At
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of Updated At
     *
     * @param \DateTime updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of Has Cart
     *
     * @return bool
     */
    public function getHasCart()
    {
        return $this->hasCart;
    }

    /**
     * Set the value of Has Cart
     *
     * @param bool hasCart
     *
     * @return self
     */
    public function setHasCart($hasCart)
    {
        $this->hasCart = $hasCart;

        return $this;
    }

    /**
     * Get the value of Cart Type
     *
     * @return bool
     */
    public function getCartType()
    {
        return $this->cartType;
    }

    /**
     * Set the value of Cart Type
     *
     * @param bool cartType
     *
     * @return self
     */
    public function setCartType($cartType)
    {
        $this->cartType = $cartType;

        return $this;
    }

}
