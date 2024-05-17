<?php

namespace Tests;

use App\Models\FruitBasket;
use App\Models\FruitBasketItem;

class FruitBasketTest extends BaseTestCase {

    public function test_adding_an_item_to_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Large Basket', 100);
        
        $fruitBasket
                ->addItem('Apple', 10)
                ->addItem('Banana', 20)
                ->addItem('Orange', 30);
        
        $this->assertEquals(60, $fruitBasket->currentWeight());
    }

    public function test_adding_too_much_fruit_to_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Small Basket', 50);
       
        $fruitBasket
            ->addItem('Apple', 10)
            ->addItem('Banana', 20);
        
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Fruit basket is full');
        
        $fruitBasket->addItem('Orange', 30);
    }

    public function test_when_retrieving_the_items_in_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Large Basket', 100);
        
        $fruitBasket
                ->addItem('Apple', 10)
                ->addItem('Banana', 20)
                ->addItem('Orange', 30);

        $fruitBasketItems = $fruitBasket->items();

        $this->assertEquals(3, count($fruitBasketItems));
        // $this->assertEquals('Apple', $fruitBasketItems[0]['name']);
    }

    public function test_you_can_not_access_items_inside_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Large Basket', 100);

        $fruitBasket
                ->addItem('Apple', 50)
                ->addItem('Banana', 50);

        $items = $fruitBasket->items();

        $this->assertNotInstanceOf(FruitBasketItem::class, $items[0]);
    }

    public function test_you_can_not_mutate_items_inside_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Large Basket', 100);

        $fruitBasket
                ->addItem('Apple', 50)
                ->addItem('Banana', 50);

        $basketWeight = $fruitBasket->currentWeight();

        $items = $fruitBasket->items();

        if ($items[0] instanceOf FruitBasketItem) {
            // Increase weight and exceed fruit basket capacity
            $items[0]->setWeight(51);

            $this->assertEquals($basketWeight, $fruitBasket->currentWeight());
            $this->assertTrue($fruitBasket->maxCapacity() >= $fruitBasket->currectWeight());
        } else {
            $this->assertTrue(true);
        }
    }
}