<?php

interface IProduct
{

}

class Factory
{
    private $product;

    public static function create(IProduct $product)
    {
        return new self($product);
    }

    public function __construct(IProduct $product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return clone $this->product;
    }
}

class Item implements IProduct
{
    private $name;

    public function getName()
    {
        echo $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

$prototype = Factory::create(new Item());

$firstProduct = $prototype->getProduct()->setName('First')->getName();
$secondProduct = $prototype->getProduct()->setName('Second')->getName();
