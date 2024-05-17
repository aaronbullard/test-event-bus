<?php

namespace App\Services;

use App\Repositories\FruitBasketRepository;

class AddItemService {

    private FruitBasketRepository $repo;

    public function __construct(FruitBasketRepository $repo) 
    {
        $this->repo = $repo;
    }

    public function __invoke(AddItemRequest $request): AddItemResponse
    {
        $fruitBasket = $this->repo->findById($request->basketId);

        if (is_null($fruitBasket)) {
            return AddItemResponse::failure('Fruit basket not found');
        }
        
        try {
            $fruitBasket->addItem($request->name, $request->weight);

            $this->repo->update($fruitBasket);
        } catch (\Throwable $e) {
            return AddItemResponse::failure($e->getMessage());
        }

        return AddItemResponse::success();
    }
}