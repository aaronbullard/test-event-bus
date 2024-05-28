<?php

namespace App\Services;

class AddItemResponse {

    const statuses = [
        'success' => 'success',
        'failure' => 'failure',
    ];

    private string $status;

    private ?string $message;

    public static function success(string $message = null): self
    {
        return new self(self::statuses['success'], $message);
    }

    public static function failure(string $message): self
    {
        return new self(self::statuses['failure'], $message);
    }

    private function __construct(string $status, string $message = null)
    {
        if(!in_array($status, self::statuses)) {
            throw new \InvalidArgumentException('Invalid status');
        }
        
        $this->status = $status;
        $this->message = $message;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function message(): string
    {
        return $this->message;
    }
}