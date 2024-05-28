<?php

namespace Factories\PaymentStrategies;

class StripePaymentGateway extends PaymentGateway {

    public function name(): string
    {
        return 'stripe';
    }

    public function pay(int $accountId, int $amount): array {
        return [
            'gateway' => self::class,
            'account_id' => $accountId,
            'amount' => $amount
        ];
    }
}