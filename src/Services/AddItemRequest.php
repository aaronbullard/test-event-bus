<?php

namespace App\Services;

class AddItemRequest {

    public readonly string $fruitBasketId;

    public readonly string $name;

    public readonly int $weight;

    public function __construct(string $fruitBasketId, string $name, int $weight)
    {
        $this->fruitBasketId = $fruitBasketId;
        $this->name = $name;
        $this->weight = $weight;
    }
}