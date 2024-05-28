<?php

namespace Factories;

class InMemoryLogger {

    private static $instance;
    
    private $logs = [];

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct(){}
    
    public function log(string $message): self
    {
        $this->logs[] = $message;

        return $this;
    }

    public function getLogs(): array
    {
        return $this->logs;
    }
}