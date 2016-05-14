<?php

interface ISingleton
{
    public static function create();
}

class Singleton implements ISingleton
{
    protected static $_instance;

    public static function create()
    {
        if (!is_null(self::$_instance))
        {
            return self::$_instance;
        }

    	self::$_instance = new self();
        return self::$_instance;
    }
}

$one = Singleton::create();
$two = Singleton::create();

var_dump($one === $two);