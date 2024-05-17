<?php

namespace App\Services;

class AddItemRequest {

    public readonly int $basketId;

    public readonly string $name;

    public readonly int $weight;

    public function __construct(int $basketId, string $name, int $weight)
    {
        $this->basketId = $basketId;
        $this->name = $name;
        $this->weight = $weight;
    }
}