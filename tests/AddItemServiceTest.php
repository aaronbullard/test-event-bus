<?php

namespace Tests;

use Mockery;
use App\Models\FruitBasket;
use App\Repositories\FruitBasketRepository;
use App\Services\AddItemRequest;
use App\Services\AddItemService;

class AddItemServiceTest extends BaseTestCase {

    private $repo;
    
    public function setUp(): void
    {
        parent::setup();
        $this->repo = Mockery::mock(FruitBasketRepository::class);
    }

    public function test_adding_an_item_to_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Large Basket', 100);
        
        $this->repo->shouldReceive('findById')->with(1)->andReturn($fruitBasket)
                    ->shouldReceive('update')->with($fruitBasket)->once();

        $request = new AddItemRequest(1, 'Apple', 10);

        $service = new AddItemService($this->repo);

        $response = $service($request);

        $this->assertEquals('success', $response->status());
    }

    public function test_adding_too_much_fruit_to_a_fruit_basket()
    {
        $fruitBasket = new FruitBasket('Small Basket', 10);
        
        $this->repo->shouldReceive('findById')->with(1)->andReturn($fruitBasket);

        $request = new AddItemRequest(1, 'Apple', 11);

        $service = new AddItemService($this->repo);

        $response = $service($request);

        $this->assertEquals('failure', $response->status());
        $this->assertEquals('Fruit basket is full', $response->message());
    }

    public function test_when_fruit_basket_not_found()
    {
        $this->repo->shouldReceive('findById')->with(1)->andReturn(null);

        $request = new AddItemRequest(1, 'Apple', 10);

        $service = new AddItemService($this->repo);

        $response = $service($request);

        $this->assertEquals('failure', $response->status());
        $this->assertEquals('Fruit basket not found', $response->message());
    }
}