<?php

namespace App\Models;

class FruitBasketItem {

    const NAMES = [
        'Apple',
        'Banana',
        'Orange',
    ];

    #[Id, Column(type: 'integer'), GeneratedValue]
    private int|null $id = null;

    #[ORM\ManyToOne(targetEntity: FruitBasket::class, inversedBy: 'items')]
    private FruitBasket $fruitBasket;

    private string $name;

    private int $weight;

    public function __construct(FruitBasket $fruitBasket, string $name, int $weight) 
    {
        if(!in_array($name, self::NAMES)) {
            throw new \InvalidArgumentException('Invalid name');
        }

        if($weight <= 0) {
            throw new \InvalidArgumentException('Invalid weight');
        }
        
        $this->fruitBasket = $fruitBasket;
        $this->name = $name;
        $this->weight = $weight;
    }

    public function id() 
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function weight()
    {
        return $this->weight;
    }

}