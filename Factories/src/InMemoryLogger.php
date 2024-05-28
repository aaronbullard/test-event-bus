<?php

namespace Factories;

class InMemoryLogger {
    
    private $logs = [];

    public function log(string $message) {
        $this->logs[] = $message;
    }

    public function getLogs(): array {
        return $this->logs;
    }
}