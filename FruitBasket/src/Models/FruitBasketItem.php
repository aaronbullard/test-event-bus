<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

class FruitBasketItem {

    const NAMES = [
        'Apple',
        'Banana',
        'Orange',
    ];

    private string $id;

    private string $name;

    private int $weight;

    private string $fruitBasketId;

    public function __construct(string $name, int $weight = null) 
    {
        if(!in_array($name, self::NAMES)) {
            throw new \InvalidArgumentException('Invalid name');
        }

        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;

        if (is_null($weight) === false) {
            $this->setWeight($weight);
        }
    }

    public function id() 
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function setWeight(int $weight): self
    {
        if($weight <= 0) {
            throw new \InvalidArgumentException('Invalid weight');
        }

        $this->weight = $weight;

        return $this;
    }

    public function weight()
    {
        return $this->weight;
    }

    public function setFruitBasketId(string $fruitBasketId): self
    {
        $this->fruitBasketId = $fruitBasketId;

        return $this;
    }

    public function fruitBasketId()
    {
        return $this->fruitBasketId;
    }

}