<?php

interface IStrategy
{
    public function make();
}

final class Builder
{
    private $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public static function create(IStrategy $strategy)
    {
        return new self($strategy);
    }

    public function build()
    {
        return $this->strategy->make();
    }
}

class FirstStrategy implements IStrategy
{
    public function make()
    {
        print 2 + 2 * 2;
    }
}

class SecondStrategy implements IStrategy
{
    public function make()
    {
        print 3 + 3 * 3;
    }
}

$first  = Builder::create(new FirstStrategy())->build();
$second = Builder::create(new SecondStrategy())->build();