<?php

namespace Factories\PaymentStrategies;

abstract class PaymentGateway {

    abstract public function name(): string;
    
    abstract public function pay(int $accountId, int $amount): array;

}