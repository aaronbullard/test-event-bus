<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

class FruitBasket {

    private string $id;

    private string $name;

    private int $maxCapacity;

    #[OneToMany(targetEntity: FruitBasketItem::class, mappedBy: 'fruitBasketId')]
    private array $items = [];

    public function __construct(string $name, int $maxCapacity) 
    {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->maxCapacity = $maxCapacity;
    }

    public function id() 
    {
        return $this->id;
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

        $item = new FruitBasketItem($name, $weight);

        $item->setFruitBasketId($this->id);
        
        $this->items[] = $item;

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