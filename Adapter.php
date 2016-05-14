<?php

interface ITargetInterface
{
    public function process();

    public function result();
}

interface IExternalInterface
{
    public function request();

    public function response();
}

class ExternalInterface implements IExternalInterface
{
    public function request()
    {
        return __CLASS__ . "::" . __METHOD__;
    }

    public function response()
    {
        return __CLASS__ . "::" . __METHOD__;
    }
}

class Adapter implements ITargetInterface
{
    protected $externalInterface = null;

    public function __construct()
    {
        $this->externalInterface = new ExternalInterface();
    }

    public function process()
    {
        return $this->externalInterface->request();
    }

    public function result()
    {
        return $this->externalInterface->response();
    }

    public static function create()
    {
        return new self();
    }
}

print Adapter::create()->process();

print Adapter::create()->result();
