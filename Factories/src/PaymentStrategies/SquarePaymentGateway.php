<?php

namespace Factories\PaymentStrategies;

class SquarePaymentGateway extends PaymentGateway {

    public function pay(int $accountId, int $amount): bool {
        print_r(sprintf("Square payment gateway for account %d with amount %d", $accountId, $amount));

        return true;
    }
}