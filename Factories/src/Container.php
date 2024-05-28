<?php

namespace Factories;

class Container {

    private static $instance;

    private $services = [];

    private function __construct(){}

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function bind(string $service, Closure $callback): self
    {
        $this->services[$service] = $callback;

        return $this;
    }

    public function make(string $service)
    {
        if (!isset($this->services[$service])) {
            throw new \Exception("Service {$service} not found");
        }
        
        return $this->services[$service]();
    }
}