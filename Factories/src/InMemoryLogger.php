<?php

namespace Factories;

class InMemoryLogger {

    private $logs = [];
    
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