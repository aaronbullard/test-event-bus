<?php

namespace App\Repositories;

use App\FauxDatabase;
use App\Models\FruitBasket;
use Doctrine\ORM\EntityManager;

class FruitBasketRepository {

    private EntityManager $em;

    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }

    public function save(FruitBasket $fruitBasket) 
    {
        $this->em->persist($fruitBasket);

        $this->em->flush();
    }

    public function update(FruitBasket $fruitBasket) 
    {
        $this->em->persist($fruitBasket);

        $this->em->flush();
    }

    public function findById(string $id): ?FruitBasket 
    {
        return $this->em->getRepository(FruitBasket::class)->find($id);
    }
}