<?php

final class Bank
{
    public function openTransaction()
    {
        return $this;
    }

    public function finalTransaction()
    {
        return $this;
    }
}

final class Client
{
    private $amount;

    public function sendMoney($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function checkStatus()
    {
        return $this;
    }
}

final class Log
{
    public function logger($message)
    {
        printf($message, PHP_EOL);
    }
}

class Facade
{
    private $bank;
    private $client;
    private $log;

    public static function create()
    {
        return new self();
    }

    public function __construct()
    {
        $this->bank = new Bank();
        $this->client = new Client();
        $this->log = new Log();
    }

    public function transfer($amount)
    {
        $this->bank->openTransaction();
        $this->client->sendMoney($amount);
        $this->bank->finalTransaction();
        $this->client->checkStatus();
        $this->log->logger("Transaction finished. Amount: $amount");
    }
}

Facade::create()->transfer(1000);