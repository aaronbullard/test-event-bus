<?php

namespace Factories\PaymentStrategies;

class SquarePaymentGateway extends PaymentGateway {

    public function pay(int $accountId, int $amount): array {
        return [
            'gateway' => self::class,
            'account_id' => $accountId,
            'amount' => $amount
        ];
    }
}