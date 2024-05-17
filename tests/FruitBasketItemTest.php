<?php

namespace Tests;

use App\Models\FruitBasket;
use App\Models\FruitBasketItem;

class FruitBasketItemTest extends BaseTestCase {

    public function setUp(): void
    {
        parent::setUp();
        $this->basket = new FruitBasket('Large Basket', 100);
    }

    public function test_it_can_only_have_fruit_names()
    {
        $correctItem = new FruitBasketItem('Apple', 10);
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid name');

        $incorrectItem = new FruitBasketItem('Brick', 10);
    }

    public function test_it_must_have_a_positive_weight()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid weight');

        new FruitBasketItem('Apple', -10);
    }
}