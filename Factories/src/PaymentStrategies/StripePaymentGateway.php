<?php

namespace Factories\PaymentStrategies;

class StripePaymentGateway extends PaymentGateway {

    public function pay(int $accountId, int $amount): bool {
        print_r(sprintf("Stripe payment gateway for account %d with amount %d", $accountId, $amount));

        return true;
    }
}