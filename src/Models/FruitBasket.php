<?php

namespace App\Models;

class FruitBasket {

    #[Id, Column(type: 'integer'), GeneratedValue]
    private int|null $id = null;

    private string $name;

    private int $maxCapacity;

    #[OneToMany(targetEntity: FruitBasketItem::class, mappedBy: 'fruitBasket')]
    private array $items = [];

    public function __construct(string $name, int $maxCapacity) 
    {
        $this->name = $name;
        $this->maxCapacity = $maxCapacity;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function maxCapacity(): int
    {
        return $this->maxCapacity;
    }

    public function addItem(string $name, int $weight): self
    {
        if($this->currentWeight() + $weight > $this->maxCapacity()) {
            throw new \LogicException('Fruit basket is full');
        }
        
        $this->items[] = new FruitBasketItem($this, $name, $weight);

        return $this;
    }

    public function items(): array
    {
        return array_map(function($item) {
            return [
                'id' => $item->id(),
                'name' => $item->name(),
                'weight' => $item->weight()
            ];
        }, $this->items);
    }

    public function currentWeight(): int
    {
        return array_reduce($this->items, function($carry, $item) {
            return $carry + $item->weight();
        }, 0);
    }

}