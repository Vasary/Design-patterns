<?php

interface IInstanceFactory
{
    public static function create();
}

abstract class AbstractFactory implements IInstanceFactory
{
    protected static $_instance = [];

    public static function create()
    {
        $className = get_called_class();

        if (@!(self::$_instance[$className] instanceof $className)) {
            self::$_instance[$className] = new $className();
        }
        return self::$_instance[$className];
    }
}

abstract class Factory extends AbstractFactory
{
    final public static function create()
    {
        return parent::create();
    }

    final public function printArray()
    {
        var_dump($this->array);
    }

    final public function push($item)
    {
        array_push($this->array, $item);
    }
}

class Product extends Factory
{
    protected $array = [];
}

class Item extends  Factory
{
    protected $array = [];
}

Product::create()->push(1);
Item::create()->push(2);

Product::create()->push(3);
Item::create()->push(4);

Product::create()->push(5);
Item::create()->push(6);

Product::create()->printArray();
Item::create()->printArray();